(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_src_views_drinksWithTaste_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/src/views/drinksWithTaste.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/src/views/drinksWithTaste.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components_DrinkItem__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../components/DrinkItem */ "./resources/js/components/DrinkItem.vue");
/* harmony import */ var _components_PrefectureModal__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../components/PrefectureModal */ "./resources/js/components/PrefectureModal.vue");
/* harmony import */ var _components_TasteModal__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../components/TasteModal */ "./resources/js/components/TasteModal.vue");
/* harmony import */ var _components_LandingPage__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../components/LandingPage */ "./resources/js/components/LandingPage.vue");
/* harmony import */ var _components_Footer__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../components/Footer */ "./resources/js/components/Footer.vue");
/* harmony import */ var _Libraries_prefectures_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../Libraries/prefectures.js */ "./resources/js/Libraries/prefectures.js");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//






/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  components: {
    LandingPage: _components_LandingPage__WEBPACK_IMPORTED_MODULE_4__.default,
    DrinkItem: _components_DrinkItem__WEBPACK_IMPORTED_MODULE_1__.default,
    PrefectureModal: _components_PrefectureModal__WEBPACK_IMPORTED_MODULE_2__.default,
    TasteModal: _components_TasteModal__WEBPACK_IMPORTED_MODULE_3__.default,
    Footer: _components_Footer__WEBPACK_IMPORTED_MODULE_5__.default
  },
  props: {// drinks: Array
  },
  data: function data() {
    return {
      drinks: [],
      loading: true,
      showPrefectureModal: false,
      showTasteModal: false,
      prefectures: {},
      selectedTags: []
    };
  },
  created: function created() {
    var _this = this;

    return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              _context.next = 2;
              return Promise.all([_this.getDrinks()]);

            case 2:
              _this.prefectures = _Libraries_prefectures_js__WEBPACK_IMPORTED_MODULE_6__.default.prefectures;

              _this.prefectures.unshift({
                code: 0,
                name: "全部"
              });

            case 4:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    }))();
  },
  methods: {
    getDrinks: function getDrinks() {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee2() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                console.log(_this2.$route.query);
                _context2.next = 3;
                return axios.get("/api/drinks", {
                  params: {
                    "with": "comments"
                  }
                }).then(function (response) {
                  _this2.drinks = response.data;
                })["catch"](function (error) {
                  console.log(error);
                });

              case 3:
                _this2.loading = false;

              case 4:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    },
    togglePrefectureModal: function togglePrefectureModal() {
      this.showPrefectureModal = !this.showPrefectureModal;
    },
    toggleTasteModal: function toggleTasteModal() {
      this.showTasteModal = !this.showTasteModal;
    },
    filterPrefecture: function filterPrefecture(val) {
      var _this3 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee3() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                if (!val) {
                  _context3.next = 8;
                  break;
                }

                _context3.next = 3;
                return axios.get("/api/drinks", {
                  params: {
                    prefecture: val,
                    "with": "comments"
                  }
                }).then(function (response) {
                  if (response.data) {
                    _this3.drinks = response.data;
                  } else {
                    return;
                  }
                })["catch"](function (error) {
                  console.log(error);
                });

              case 3:
                _this3.loading = false;
                _this3.showPrefectureModal = false;
                console.log(val);
                _context3.next = 11;
                break;

              case 8:
                _context3.next = 10;
                return axios.get("/api/drinks", {
                  params: {
                    "with": "comments"
                  }
                }).then(function (response) {
                  _this3.drinks = response.data;
                })["catch"](function (error) {
                  console.log(error);
                });

              case 10:
                _this3.showPrefectureModal = false;

              case 11:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3);
      }))();
    },
    filterTaste: function filterTaste(val) {
      var _this4 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee4() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee4$(_context4) {
          while (1) {
            switch (_context4.prev = _context4.next) {
              case 0:
                if (!val) {
                  _context4.next = 9;
                  break;
                }

                _this4.selectedTags = val;
                _context4.next = 4;
                return axios.get("/api/drinks", {
                  params: {
                    tags: _this4.a,
                    "with": "comments"
                  }
                }).then(function (response) {
                  if (response.data) {
                    _this4.drinks = response.data; // this.$router.replace({ query: {"search" :"taste"} })
                  } else {
                    return;
                  }
                })["catch"](function (error) {
                  console.log(error);
                });

              case 4:
                _this4.loading = false;
                _this4.showTasteModal = false;
                console.log(val);
                _context4.next = 12;
                break;

              case 9:
                _context4.next = 11;
                return axios.get("/api/drinks", {
                  params: {
                    "with": "comments"
                  }
                }).then(function (response) {
                  _this4.drinks = response.data;
                })["catch"](function (error) {
                  console.log(error);
                });

              case 11:
                _this4.showTasteModal = false;

              case 12:
              case "end":
                return _context4.stop();
            }
          }
        }, _callee4);
      }))();
    }
  }
});

/***/ }),

/***/ "./resources/js/src/views/drinksWithTaste.vue":
/*!****************************************************!*\
  !*** ./resources/js/src/views/drinksWithTaste.vue ***!
  \****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _drinksWithTaste_vue_vue_type_template_id_33fbec88___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./drinksWithTaste.vue?vue&type=template&id=33fbec88& */ "./resources/js/src/views/drinksWithTaste.vue?vue&type=template&id=33fbec88&");
/* harmony import */ var _drinksWithTaste_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./drinksWithTaste.vue?vue&type=script&lang=js& */ "./resources/js/src/views/drinksWithTaste.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _drinksWithTaste_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _drinksWithTaste_vue_vue_type_template_id_33fbec88___WEBPACK_IMPORTED_MODULE_0__.render,
  _drinksWithTaste_vue_vue_type_template_id_33fbec88___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/drinksWithTaste.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/drinksWithTaste.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/src/views/drinksWithTaste.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_drinksWithTaste_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./drinksWithTaste.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/src/views/drinksWithTaste.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_drinksWithTaste_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/src/views/drinksWithTaste.vue?vue&type=template&id=33fbec88&":
/*!***********************************************************************************!*\
  !*** ./resources/js/src/views/drinksWithTaste.vue?vue&type=template&id=33fbec88& ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_drinksWithTaste_vue_vue_type_template_id_33fbec88___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_drinksWithTaste_vue_vue_type_template_id_33fbec88___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_drinksWithTaste_vue_vue_type_template_id_33fbec88___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./drinksWithTaste.vue?vue&type=template&id=33fbec88& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/src/views/drinksWithTaste.vue?vue&type=template&id=33fbec88&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/src/views/drinksWithTaste.vue?vue&type=template&id=33fbec88&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/src/views/drinksWithTaste.vue?vue&type=template&id=33fbec88& ***!
  \**************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _vm.loading
    ? _c(
        "div",
        {
          staticClass: "flex justify-center items-center",
          staticStyle: { height: "90vh" }
        },
        [
          _c("div", {
            staticClass:
              "spinner-border animate-spin inline-block w-8 h-8 border-4 rounded-full text-blue-400",
            attrs: { role: "status" }
          })
        ]
      )
    : _c("div", [
        _c(
          "div",
          [
            _c(
              "div",
              [
                _c("LandingPage"),
                _vm._v(" "),
                _c(
                  "section",
                  { staticClass: "bg-white py-4" },
                  [
                    _c("div", { staticClass: "w-full my-4" }, [
                      _c(
                        "div",
                        { staticClass: "flex items-center justify-center" },
                        [
                          _c(
                            "div",
                            { staticClass: "flex space-x-2 justify-center" },
                            [
                              _c(
                                "button",
                                { on: { click: _vm.togglePrefectureModal } },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "border-2 bg-black border-gray-800 rounded-lg px-3 py-2 text-white cursor-pointer hover:bg-gray-800 hover:text-white"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                    都道府県から探す\n                                "
                                      )
                                    ]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "button",
                                { on: { click: _vm.toggleTasteModal } },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "border-2 bg-black border-gray-800 rounded-lg px-3 py-2 text-white cursor-pointer hover:bg-gray-800 hover:text-white"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                    好みから探す\n                                "
                                      )
                                    ]
                                  )
                                ]
                              )
                            ]
                          )
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _vm.showPrefectureModal
                      ? [
                          _c("PrefectureModal", {
                            attrs: { prefectures: _vm.prefectures },
                            on: { "execute-method": _vm.filterPrefecture }
                          })
                        ]
                      : _vm._e(),
                    _vm._v(" "),
                    _vm.showTasteModal
                      ? [
                          _c("TasteModal", {
                            on: { "execute-method": _vm.filterTaste }
                          })
                        ]
                      : _vm._e(),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass:
                          "container mx-auto flex items-center flex-wrap pt-1 pb-12 "
                      },
                      [
                        _vm.drinks.length > 0
                          ? _vm._l(_vm.drinks, function(drink) {
                              return _c(
                                "div",
                                {
                                  staticClass:
                                    "w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col  inline-block sm:-m-4 -mx-4 md:mx-0"
                                },
                                [_c("DrinkItem", { attrs: { drink: drink } })],
                                1
                              )
                            })
                          : [_c("h1", [_vm._v("アイテムがありません.....")])]
                      ],
                      2
                    )
                  ],
                  2
                )
              ],
              1
            ),
            _vm._v(" "),
            _c("Footer")
          ],
          1
        )
      ])
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);