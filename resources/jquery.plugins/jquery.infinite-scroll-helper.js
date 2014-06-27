(function(e,t){"use strict";function s(t,n,r){e.isFunction(t[n])&&t[n].apply(t,r)}function o(n,r){this.element=e(n),this.options=e.extend({},i,r),this.win=e(t),this.loading=!1,this.doneLoadingInt=null,this.pageCount=1,this._init()}var n="infiniteScrollHelper",r="plugin_"+n,i={bottomBuffer:0,doneLoading:e.noop,interval:300,loadingClass:"loading",loadMore:e.noop};o.prototype._init=function(){this._addListeners()},o.prototype._addListeners=function(){var e=this;e.win.on("scroll."+n,function(t){e._shouldTriggerLoad()&&(e.pageCount++,e.options.loadMore(e.pageCount),e.loading=!0,e.element.addClass(e.options.loadingClass),e.doneLoadingInt=setInterval(function(){e.options.doneLoading(e.pageCount)&&(clearInterval(e.doneLoadingInt),e.loading=!1,e.element.removeClass(e.options.loadingClass))},e.options.interval))})},o.prototype._shouldTriggerLoad=function(){var e=this.element.offset(),t=this.element.height()+e.top,n=this.win.scrollTop()+this.win.height()+this.options.bottomBuffer;return!this.loading&&n>=t},o.prototype.destroy=function(){this.win.off("scroll."+n),this.options.loadMore=null,this.options.doneLoading=null,clearInterval(this.doneLoadingInt),this.element.data(r,null)},e.fn[n]=function(t){var n=!1,i=arguments;return typeof t=="string"&&(n=t),this.each(function(){var u=e.data(this,r);u?n&&s(u,n,Array.prototype.slice.call(i,1)):e.data(this,r,new o(this,t))})}})(jQuery,window);