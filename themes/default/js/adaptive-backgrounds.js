!function(n){function t(){"use strict";if(window.addEventListener){if(!this)return new t;this.images=e(),this.images.length&&window.addEventListener("load",function(){this.init(),this.process()}.bind(this))}}function e(){return n.querySelectorAll("[data-adaptive-background]")}t.prototype.init=function(){var n,t,e,o,i;n=window,t=function(n,t){var e=new Image;e.crossOrigin="Anonymous",e.src=n.src,e.onload=function(){var o=document.createElement("canvas").getContext("2d");o.drawImage(e,0,0);var i=o.getImageData(0,0,n.width,n.height);t&&t(i.data)}},e=function(n){return["rgb(",n,",0.08)"].join("")},o=function(n){return n.map(function(n){return e(n.name)})},i={colors:function(n,i,a){t(n,function(n){for(var t=n.length,r={},c="",u=[],s={dominant:{name:"",count:0},palette:Array.apply(null,Array(a||10)).map(Boolean).map(function(n){return{name:"0,0,0",count:0}})},d=0;d<t;){if(u[0]=n[d],u[1]=n[d+1],u[2]=n[d+2],r[c=u.join(",")]=c in r?r[c]+1:1,"0,0,0"!==c&&"255,255,255"!==c){var m=r[c];m>s.dominant.count?(s.dominant.name=c,s.dominant.count=m):s.palette.some(function(n){if(m>n.count)return n.name=c,n.count=m,!0})}d+=20}i&&i({dominant:e(s.dominant.name),palette:o(s.palette)})})}},n.RGBaster=n.RGBaster||i},t.prototype.process=function(){for(var n=this.images.length-1;n>=0;n--)!function(n){RGBaster.colors(n,function(t){n.parentNode.style.backgroundColor=t.dominant},20)}(this.images[n])},t.prototype.refresh=function(){this.images=e()},window.AdaptiveBackgrounds=t}(document);