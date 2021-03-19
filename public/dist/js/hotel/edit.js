/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/vue-ckeditor2/dist/vue-ckeditor2.esm.js":
/*!**************************************************************!*\
  !*** ./node_modules/vue-ckeditor2/dist/vue-ckeditor2.esm.js ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var t=(new Date).getTime();/* harmony default export */ __webpack_exports__["default"] = (function(t,n,e,i,s,o,a,c,r,d){"boolean"!=typeof a&&(r=c,c=a,a=!1);var u,h="function"==typeof e?e.options:e;if(t&&t.render&&(h.render=t.render,h.staticRenderFns=t.staticRenderFns,h._compiled=!0,s&&(h.functional=!0)),i&&(h._scopeId=i),o?(u=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),n&&n.call(this,r(t)),t&&t._registeredComponents&&t._registeredComponents.add(o)},h._ssrRegister=u):n&&(u=a?function(){n.call(this,d(this.$root.$options.shadowRoot))}:function(t){n.call(this,c(t))}),u)if(h.functional){var f=h.render;h.render=function(t,n){return u.call(n),f(t,n)}}else{var l=h.beforeCreate;h.beforeCreate=l?[].concat(l,u):[u]}return e}({render:function(){var t=this.$createElement,n=this._self._c||t;return n("div",{staticClass:"ckeditor"},[n("textarea",{attrs:{name:this.name,id:this.id,types:this.types,config:this.config,disabled:this.readOnlyMode},domProps:{value:this.value}})])},staticRenderFns:[]},void 0,{name:"VueCkeditor",props:{name:{type:String,default:function(){return"editor-".concat(++t)}},value:{type:String},id:{type:String,default:function(){return"editor-".concat(t)}},types:{type:String,default:function(){return"classic"}},config:{type:Object,default:function(){}},instanceReadyCallback:{type:Function},readOnlyMode:{type:Boolean,default:function(){return!1}}},data:function(){return{instanceValue:""}},computed:{instance:function(){return CKEDITOR.instances[this.id]}},watch:{value:function(t){try{this.instance&&this.update(t)}catch(t){}},readOnlyMode:function(t){this.instance.setReadOnly(t)}},mounted:function(){this.create()},methods:{create:function(){var t=this;"undefined"==typeof CKEDITOR?console.log("CKEDITOR is missing (http://ckeditor.com/)"):("inline"===this.types?CKEDITOR.inline(this.id,this.config):CKEDITOR.replace(this.id,this.config),this.instance.setData(this.value),this.instance.on("instanceReady",function(){t.instance.setData(t.value)}),this.instance.on("change",this.onChange),this.instance.on("mode",this.onMode),this.instance.on("blur",function(n){t.$emit("blur",n)}),this.instance.on("focus",function(n){t.$emit("focus",n)}),this.instance.on("contentDom",function(n){t.$emit("contentDom",n)}),CKEDITOR.on("dialogDefinition",function(n){t.$emit("dialogDefinition",n)}),this.instance.on("fileUploadRequest",function(n){t.$emit("fileUploadRequest",n)}),this.instance.on("fileUploadResponse",function(n){setTimeout(function(){t.onChange()},0),t.$emit("fileUploadResponse",n)}),void 0!==this.instanceReadyCallback&&this.instance.on("instanceReady",this.instanceReadyCallback),this.$once("hook:beforeDestroy",function(){t.destroy()}))},update:function(t){this.instanceValue!==t&&(this.instance.setData(t,{internal:!1}),this.instanceValue=t)},destroy:function(){try{var t=window.CKEDITOR;t.instances&&t.instances[this.id]&&t.instances[this.id].destroy()}catch(t){}},onMode:function(){var t=this;if("source"===this.instance.mode){var n=this.instance.editable();n.attachListener(n,"input",function(){t.onChange()})}},onChange:function(){var t=this.instance.getData();t!==this.value&&(this.$emit("input",t),this.instanceValue=t)}}},void 0,!1,void 0,void 0,void 0));


/***/ }),

/***/ "./resources/js/hotel/edit.js":
/*!************************************!*\
  !*** ./resources/js/hotel/edit.js ***!
  \************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue_ckeditor2__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue-ckeditor2 */ "./node_modules/vue-ckeditor2/dist/vue-ckeditor2.esm.js");

new Vue({
  el: '#createHotel',
  data: {
    data: data,
    id: data.id,
    is_submit: false,
    error: '',
    error_image: '',
    image: '',
    error_description: '',
    config: {
      toolbar: [['Bold', 'Italic', 'Underline', 'Strike', 'NumberedList', 'BulletedList', 'Indent', 'Outdent', 'Format', 'BGColor', 'TextColor']],
      height: 300
    }
  },
  components: {
    VueCkeditor: vue_ckeditor2__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  mounted: function mounted() {},
  methods: {
    submit: function submit() {
      var _this = this;

      this.$validator.validateAll().then(function (result) {
        _this.is_submit = true;
        var save = true;

        if (result && save) {
          axios.post('/admin/hotel/update/' + _this.id, _this.data).then(function (response) {
            if (response.data.success) {
              window.location.href = '/admin/hotel/list';
            } else {
              console.log(response.data.message);
              _this.error = response.data.message;
            }
          });
        } else {
          //set Window location to top
          window.scrollTo(0, 0);
        }
      });
    },
    uploadAddingImage: function uploadAddingImage(index, event) {
      var _this2 = this;

      var image = event.target.files[0];
      console.log(event.target.files[0].size);
      var reader = new FileReader();
      reader.readAsDataURL(image);

      reader.onload = function (event) {
        Vue.set(_this2.data.medias[index], 'image', event.target.result);
        _this2.data[index].error = {
          image: ''
        };
      };
    },
    addMedias: function addMedias() {
      this.data.medias.push({
        image: '',
        error: {
          image: ''
        },
        sort: this.data.medias.length + 1
      });
    },
    removeSlider: function removeSlider(index) {
      this.data.medias.splice(index, 1);
      this.data.medias.forEach(function (item, i) {
        item.sort = i + 1;
      });
    }
  }
});

/***/ }),

/***/ 3:
/*!******************************************!*\
  !*** multi ./resources/js/hotel/edit.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/chhounsophanon/Desktop/web_project/hotel_management/Desktop/Laravel/project/hotel_system/resources/js/hotel/edit.js */"./resources/js/hotel/edit.js");


/***/ })

/******/ });