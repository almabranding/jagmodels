/*! sly 1.1.0 - 10th Sep 2013 | https://github.com/Darsain/sly */
(function(h,y,sa){function oa(f,ia,m){var ta,u,ua,z,M,y,U,pa;function ca(){var a=0,j=0,b=v.length;e.old=h.extend({},e);s=F?0:C[c.horizontal?"width":"height"]();N=I[c.horizontal?"width":"height"]();n=F?f:r[c.horizontal?"outerWidth":"outerHeight"]();v.length=0;e.start=0;e.end=Math.max(n-s,0);if(D){j=k.length;A=r.children(c.itemSelector);k.length=0;var Da=da(r,c.horizontal?"paddingLeft":"paddingTop"),ia=da(r,c.horizontal?"paddingRight":"paddingBottom"),Ea=da(A,c.horizontal?"marginLeft":"marginTop"),
a=da(A.slice(-1),c.horizontal?"marginRight":"marginBottom"),l=0,q="none"!==A.css("float"),a=Ea?0:a;n=0;A.each(function(a,b){var j=h(b),d=j[c.horizontal?"outerWidth":"outerHeight"](!0),K=da(j,c.horizontal?"marginLeft":"marginTop"),j=da(j,c.horizontal?"marginRight":"marginBottom"),e={el:b,size:d,half:d/2,start:n-(!a||c.horizontal?0:K),center:n-Math.round(s/2-d/2),end:n-s+d-(Ea?0:j)};a||(l=-(J?Math.round(s/2-d/2):0)+Da,n+=Da);n+=d;!c.horizontal&&!q&&j&&(K&&0<a)&&(n-=Math.min(K,j));a===A.length-1&&(n+=
ia);k.push(e)});r[0].style[c.horizontal?"width":"height"]=n+"px";n-=a;e.start=l;e.end=J?k.length?k[k.length-1].center:l:Math.max(n-s,0)}e.center=Math.round(e.end/2+e.start/2);h.extend(g,va(void 0));B.length&&0<N&&(c.dynamicHandle?(O=J?k.length?N*s/(s+k[k.length-1].center-k[0].center):N:N*s/n,O=w(Math.round(O),c.minHandleSize,N),B[0].style[c.horizontal?"width":"height"]=O+"px"):O=B[c.horizontal?"outerWidth":"outerHeight"](),p.end=N-O,V||na());if(!F&&0<s){var m=e.start,a="";if(D)h.each(k,function(a,
j){if(J||j.start+j.size>m)m=j[J?"center":"start"],v.push(m),m+=s});else for(;m-s<e.end;)v.push(m),m+=s;if(W[0]&&b!==v.length){for(b=0;b<v.length;b++)a+=c.pageBuilder.call(d,b);ja=W.html(a).children();ja.eq(g.activePage).addClass(c.activeClass)}}g.slideeSize=n;g.frameSize=s;g.sbSize=N;g.handleSize=O;if(D){if(d.initialized){if(g.activeItem>=k.length||0===j&&0<k.length)qa(0<k.length?k.length-1:0)}else qa(c.startAt),d[P?"toCenter":"toStart"](c.startAt);G(w(e.dest,e.start,e.end))}else d.initialized?G(w(e.dest,
e.start,e.end)):G(c.startAt,1);x("load")}function G(a,j,K){if(D&&b.released&&!K){K=va(a);var f=a>e.start&&a<e.end;P?(f&&(a=k[K.centerItem].center),J&&c.activateMiddle&&qa(K.centerItem)):f&&(a=k[K.firstItem].start)}b.init&&b.slidee&&c.elasticBounds?a>e.end?a=e.end+(a-e.end)/6:a<e.start&&(a=e.start+(a-e.start)/6):a=w(a,e.start,e.end);ta=+new Date;u=0;ua=e.cur;z=a;M=a-e.cur;y=b.tweese||b.init&&!b.slidee;U=!y&&(j||b.init&&b.slidee||!c.speed);b.tweese=0;a!==e.dest&&(e.dest=a,x("change"),V||ba());b.released&&
!d.isPaused&&d.resume();h.extend(g,va(void 0));Fa();ja[0]&&q.page!==g.activePage&&(q.page=g.activePage,ja.removeClass(c.activeClass).eq(g.activePage).addClass(c.activeClass),x("activePage",q.page))}function ba(){V?(U?e.cur=z:y?(pa=z-e.cur,e.cur=0.1>Math.abs(pa)?z:e.cur+pa*(b.released?c.swingSpeed:c.syncSpeed)):(u=Math.min(+new Date-ta,c.speed),e.cur=ua+M*jQuery.easing[c.easing](u/c.speed,u,0,1,c.speed)),z===e.cur?(e.cur=z,b.tweese=V=0):V=ka(ba),x("move"),F||(H?r[0].style[H]=la+(c.horizontal?"translateX":
"translateY")+"("+-e.cur+"px)":r[0].style[c.horizontal?"left":"top"]=-Math.round(e.cur)+"px"),!V&&b.released&&x("moveEnd"),na()):(V=ka(ba),b.released&&x("moveStart"))}function na(){B.length&&(p.cur=e.start===e.end?0:((b.init&&!b.slidee?e.dest:e.cur)-e.start)/(e.end-e.start)*p.end,p.cur=w(Math.round(p.cur),p.start,p.end),q.hPos!==p.cur&&(q.hPos=p.cur,H?B[0].style[H]=la+(c.horizontal?"translateX":"translateY")+"("+p.cur+"px)":B[0].style[c.horizontal?"left":"top"]=p.cur+"px"))}function Ga(){(!t.speed||
e.cur===(0<t.speed?e.end:e.start))&&d.stop();Ha=b.init?ka(Ga):0;t.now=+new Date;t.pos=e.cur+(t.now-t.lastTime)/1E3*t.speed;G(b.init?t.pos:Math.round(t.pos));!b.init&&e.cur===e.dest&&x("moveEnd");t.lastTime=t.now}function wa(a,j,b){"boolean"===Q(j)&&(b=j,j=sa);j===sa?G(e[a],b):P&&"center"!==a||(j=d.getPos(j))&&G(j[a],b,!P)}function ra(a){return"undefined"!==Q(a)?R(a)?0<=a&&a<k.length?a:-1:A.index(a):-1}function xa(a){return ra(R(a)&&0>a?a+k.length:a)}function qa(a){a=ra(a);if(!D||0>a)return!1;q.active!==
a&&(A.eq(g.activeItem).removeClass(c.activeClass),A.eq(a).addClass(c.activeClass),q.active=g.activeItem=a,Fa(),x("active",a));return a}function va(a){a=w(R(a)?a:e.dest,e.start,e.end);var j={},b=J?0:s/2;if(!F)for(var c=0,d=v.length;c<d;c++){if(a>=e.end||c===v.length-1){j.activePage=v.length-1;break}if(a<=v[c]+b){j.activePage=c;break}}if(D){for(var d=c=b=!1,f=0,g=k.length;f<g;f++)if(!1===b&&a<=k[f].start+k[f].half&&(b=f),!1===d&&a<=k[f].center+k[f].half&&(d=f),f===g-1||a<=k[f].end+k[f].half){c=f;break}j.firstItem=
R(b)?b:0;j.centerItem=R(d)?d:j.firstItem;j.lastItem=R(c)?c:j.centerItem}return j}function Fa(){var a=e.dest<=e.start,j=e.dest>=e.end,d=a?1:j?2:3;q.slideePosState!==d&&(q.slideePosState=d,X.is("button,input")&&X.prop("disabled",a),Y.is("button,input")&&Y.prop("disabled",j),X.add(ea)[a?"addClass":"removeClass"](c.disabledClass),Y.add(Z)[j?"addClass":"removeClass"](c.disabledClass));q.fwdbwdState!==d&&b.released&&(q.fwdbwdState=d,ea.is("button,input")&&ea.prop("disabled",a),Z.is("button,input")&&Z.prop("disabled",
j));D&&(a=0===g.activeItem,j=g.activeItem>=k.length-1,d=a?1:j?2:3,q.itemsButtonState!==d&&(q.itemsButtonState=d,$.is("button,input")&&$.prop("disabled",a),aa.is("button,input")&&aa.prop("disabled",j),$[a?"addClass":"removeClass"](c.disabledClass),aa[j?"addClass":"removeClass"](c.disabledClass)))}function Ia(a,b,c){a=xa(a);b=xa(b);if(-1<a&&-1<b&&a!==b&&(!c||b!==a-1)&&(c||b!==a+1)){A.eq(a)[c?"insertAfter":"insertBefore"](k[b].el);var d=a<b?a:c?b:b-1,e=a>b?a:c?b+1:b,f=a>b;a===g.activeItem?q.active=g.activeItem=
c?f?b+1:b:f?b:b-1:g.activeItem>d&&g.activeItem<e&&(q.active=g.activeItem+=f?1:-1);ca()}}function Ja(a,b){for(var c=0,d=E[a].length;c<d;c++)if(E[a][c]===b)return c;return-1}function Ka(a){return Math.round(w(a,p.start,p.end)/p.end*(e.end-e.start))+e.start}function Ba(){b.history[0]=b.history[1];b.history[1]=b.history[2];b.history[2]=b.history[3];b.history[3]=b.delta}function La(a){b.released=0;b.source=a;b.slidee="slidee"===a}function Ma(a){if(!b.init){var d="touchstart"===a.type,f=a.data.source,g=
"slidee"===f;if(!("handle"===f&&(!c.dragHandle||p.start===p.end)))if(!g||(d?c.touchDragging:c.mouseDragging&&2>a.which))d||L(a,1),La(f),b.$source=h(a.target),b.init=0,b.touch=d,b.pointer=d?a.originalEvent.touches[0]:a,b.initX=b.pointer.pageX,b.initY=b.pointer.pageY,b.initPos=g?e.cur:p.cur,b.start=+new Date,b.time=0,b.path=0,b.pathToInit=g?d?50:10:0,b.history=[0,0,0,0],b.initLoc=b[c.horizontal?"initX":"initY"],b.deltaMin=g?-b.initLoc:-p.cur,b.deltaMax=g?document[c.horizontal?"width":"height"]-b.initLoc:
p.end-p.cur,(g?r:B).addClass(c.draggedClass),fa.on(d?Na:Oa,Pa),g&&(Qa=setInterval(Ba,10))}}function Pa(a){b.released="mouseup"===a.type||"touchend"===a.type;b.pointer=b.touch?a.originalEvent[b.released?"changedTouches":"touches"][0]:a;b.pathX=b.pointer.pageX-b.initX;b.pathY=b.pointer.pageY-b.initY;b.pathTotal=Math.sqrt(Math.pow(b.pathX,2)+Math.pow(b.pathY,2));b.delta=w(c.horizontal?b.pathX:b.pathY,b.deltaMin,b.deltaMax);if(!b.init&&b.pathTotal>b.pathToInit){if(b.slidee){if(c.horizontal?Math.abs(b.pathX)<
Math.abs(b.pathY):Math.abs(b.pathX)>Math.abs(b.pathY)){ya();return}b.$source.on(ga,Ra)}b.init=1;d.pause(1);x("moveStart")}b.init?(b.released?(b.touch||L(a),ya(),c.releaseSwing&&b.slidee&&(b.swing=300*((b.delta-b.history[0])/40),b.delta+=b.swing,b.tweese=10<Math.abs(b.swing))):L(a),G(b.slidee?Math.round(b.initPos-b.delta):Ka(b.initPos+b.delta))):b.released&&ya()}function ya(){clearInterval(Qa);fa.off(b.touch?Na:Oa,Pa);(b.slidee?r:B).removeClass(c.draggedClass);d.resume(1);e.cur===e.dest&&b.init&&x("moveEnd");
b.init=0}function Sa(){d.stop();fa.off("mouseup",Sa)}function ha(a){L(a);switch(this){case Z[0]:case ea[0]:d.moveBy(Z.is(this)?c.moveBy:-c.moveBy);fa.on("mouseup",Sa);break;case $[0]:d.prev();break;case aa[0]:d.next();break;case X[0]:d.prevPage();break;case Y[0]:d.nextPage()}}function Ca(a){c.scrollBy&&e.start!==e.end&&(L(a,1),d.slideBy(c.scrollBy*w(-a.originalEvent.wheelDelta||a.originalEvent.detail||a.originalEvent.deltaY,-1,1)))}function Wa(a){c.clickBar&&a.target===I[0]&&(L(a),G(Ka((c.horizontal?
a.pageX-I.offset().left:a.pageY-I.offset().top)-O/2)))}function Xa(a){if(c.keyboardNavBy)switch(a.which){case c.horizontal?37:38:L(a);d["pages"===c.keyboardNavBy?"prevPage":"prev"]();break;case c.horizontal?39:40:L(a),d["pages"===c.keyboardNavBy?"nextPage":"next"]()}}function Ya(){this.parentNode===r[0]&&d.activate(this)}function Za(){this.parentNode===W[0]&&d.activatePage(ja.index(this))}function $a(a){if(c.pauseOnHover)d["mouseenter"===a.type?"pause":"resume"](2)}function x(a,b){if(E[a]){za=E[a].length;
for(S=Aa.length=0;S<za;S++)Aa.push(E[a][S]);for(S=0;S<za;S++)Aa[S].call(d,a,b)}}var c=h.extend({},oa.defaults,ia),d=this,F=R(f),C=h(f),r=C.children().eq(0),s=0,n=0,e={start:0,center:0,end:0,cur:0,dest:0},I=h(c.scrollBar).eq(0),B=I.children().eq(0),N=0,O=0,p={start:0,end:0,cur:0},W=h(c.pagesBar),ja=0,v=[],A=0,k=[],g={firstItem:0,lastItem:0,centerItem:0,activeItem:-1,activePage:0};ia="basic"===c.itemNav;var J="forceCentered"===c.itemNav,P="centered"===c.itemNav||J,D=!F&&(ia||P||J),Ta=c.scrollSource?
h(c.scrollSource):C,ab=c.dragSource?h(c.dragSource):C,Z=h(c.forward),ea=h(c.backward),$=h(c.prev),aa=h(c.next),X=h(c.prevPage),Y=h(c.nextPage),E={},q={};pa=U=y=M=z=ua=u=ta=void 0;var t={},b={released:1},V=0,Qa=0,T=0,Ha=0,S,za;F||(f=C[0]);d.initialized=0;d.frame=f;d.slidee=r[0];d.pos=e;d.rel=g;d.items=k;d.pages=v;d.isPaused=0;d.options=c;d.reload=ca;d.getPos=function(a){if(D)return a=ra(a),-1!==a?k[a]:!1;var b=r.find(a).eq(0);return b[0]?(a=c.horizontal?b.offset().left-r.offset().left:b.offset().top-
r.offset().top,b=b[c.horizontal?"outerWidth":"outerHeight"](),{start:a,center:a-s/2+b/2,end:a-s+b,size:b}):!1};d.moveBy=function(a){t.speed=a;if(!b.init&&t.speed&&e.cur!==(0<t.speed?e.end:e.start))t.lastTime=+new Date,t.startPos=e.cur,La("button"),b.init=1,x("moveStart"),ma(Ha),Ga()};d.stop=function(){"button"===b.source&&(b.init=0,b.released=1)};d.prev=function(){d.activate(g.activeItem-1)};d.next=function(){d.activate(g.activeItem+1)};d.prevPage=function(){d.activatePage(g.activePage-1)};d.nextPage=
function(){d.activatePage(g.activePage+1)};d.slideBy=function(a,b){if(D)d[P?"toCenter":"toStart"](w((P?g.centerItem:g.firstItem)+c.scrollBy*a,0,k.length));else G(e.dest+a,b)};d.slideTo=function(a,b){G(a,b)};d.toStart=function(a,b){wa("start",a,b)};d.toEnd=function(a,b){wa("end",a,b)};d.toCenter=function(a,b){wa("center",a,b)};d.getIndex=ra;d.activate=function(a,e){var f=qa(a);c.smart&&!1!==f&&(P?d.toCenter(f,e):f>=g.lastItem?d.toStart(f,e):f<=g.firstItem?d.toEnd(f,e):b.released&&!d.isPaused&&d.resume())};
d.activatePage=function(a,b){R(a)&&G(v[w(a,0,v.length-1)],b)};d.resume=function(a){if(c.cycleBy&&c.cycleInterval&&!("items"===c.cycleBy&&!k[0]||a<d.isPaused))d.isPaused=0,T?T=clearTimeout(T):x("resume"),T=setTimeout(function(){x("cycle");switch(c.cycleBy){case "items":d.activate(g.activeItem>=k.length-1?0:g.activeItem+1);break;case "pages":d.activatePage(g.activePage>=v.length-1?0:g.activePage+1)}},c.cycleInterval)};d.pause=function(a){a<d.isPaused||(d.isPaused=a||100,T&&(T=clearTimeout(T),x("pause")))};
d.toggle=function(){d[T?"pause":"resume"]()};d.set=function(a,b){h.isPlainObject(a)?h.extend(c,a):c.hasOwnProperty(a)&&(c[a]=b)};d.add=function(a,b){var c=h(a);D?("undefined"===Q(b)||!k[0]?c.appendTo(r):k.length&&c.insertBefore(k[b].el),b<=g.activeItem&&(q.active=g.activeItem+=c.length)):r.append(c);ca()};d.remove=function(a){if(D){if(a=xa(a),-1<a){A.eq(a).remove();var b=a===g.activeItem&&!(J&&c.activateMiddle);a<g.activeItem&&(q.active=--g.activeItem);ca();b&&(q.active=null,d.activate(g.activeItem))}}else h(a).remove(),
ca()};d.moveAfter=function(a,b){Ia(a,b,1)};d.moveBefore=function(a,b){Ia(a,b)};d.on=function(a,b){if("object"===Q(a))for(var c in a){if(a.hasOwnProperty(c))d.on(c,a[c])}else if("function"===Q(b)){c=a.split(" ");for(var e=0,f=c.length;e<f;e++)E[c[e]]=E[c[e]]||[],-1===Ja(c[e],b)&&E[c[e]].push(b)}else if("array"===Q(b)){c=0;for(e=b.length;c<e;c++)d.on(a,b[c])}};d.one=function(a,b){function c(){b.apply(d,arguments);d.off(a,c)}d.on(a,c)};d.off=function(a,b){if(b instanceof Array)for(var c=0,e=b.length;c<
e;c++)d.off(a,b[c]);else for(var c=a.split(" "),e=0,f=c.length;e<f;e++)if(E[c[e]]=E[c[e]]||[],"undefined"===Q(b))E[c[e]].length=0;else{var g=Ja(c[e],b);-1!==g&&E[c[e]].splice(g,1)}};d.destroy=function(){fa.add(Ta).add(B).add(I).add(W).add(Z).add(ea).add($).add(aa).add(X).add(Y).unbind("."+l);$.add(aa).add(X).add(Y).removeClass(c.disabledClass);A&&A.eq(g.activeItem).removeClass(c.activeClass);W.empty();F||(C.unbind("."+l),r.add(B).css(H||(c.horizontal?"left":"top"),H?"none":0),h.removeData(f,l));d.initialized=
0;return d};d.init=function(){if(!d.initialized){d.on(m);var a=B;F||(a=a.add(r),C.css("overflow","hidden"),!H&&"static"===C.css("position")&&C.css("position","relative"));H?la&&a.css(H,la):("static"===I.css("position")&&I.css("position","relative"),a.css({position:"absolute"}));if(c.forward)Z.on(Ua,ha);if(c.backward)ea.on(Ua,ha);if(c.prev)$.on(ga,ha);if(c.next)aa.on(ga,ha);if(c.prevPage)X.on(ga,ha);if(c.nextPage)Y.on(ga,ha);Ta.on("DOMMouseScroll."+l+" mousewheel."+l,Ca);if(I[0])I.on(ga,Wa);if(D&&
c.activateOn)C.on(c.activateOn+"."+l,"*",Ya);if(W[0]&&c.activatePageOn)W.on(c.activatePageOn+"."+l,"*",Za);ab.on(Va,{source:"slidee"},Ma);if(B)B.on(Va,{source:"handle"},Ma);fa.bind("keydown."+l,Xa);F||(C.on("mouseenter."+l+" mouseleave."+l,$a),C.on("scroll."+l,bb));ca();if(c.cycleBy&&!F)d[c.startPaused?"pause":"resume"]();d.initialized=1;return d}}}function Q(f){return null==f?String(f):"object"===typeof f||"function"===typeof f?Object.prototype.toString.call(f).match(/\s([a-z]+)/i)[1].toLowerCase()||
"object":typeof f}function L(f,h){f.preventDefault();h&&f.stopPropagation()}function Ra(f){L(f,1);h(this).off(f.type,Ra)}function bb(){this.scrollTop=this.scrollLeft=0}function R(f){return!isNaN(parseFloat(f))&&isFinite(f)}function da(f,h){return parseInt(f.css(h),10)||0}function w(f,h,m){return f<h?h:f>m?m:f}for(var l="sly",ma=y.cancelAnimationFrame||y.cancelRequestAnimationFrame,ka=y.requestAnimationFrame,H,la,fa=h(document),Va="touchstart."+l+" mousedown."+l,Oa="mousemove."+l+" mouseup."+l,Na=
"touchmove."+l+" touchend."+l,ga="click."+l,Ua="mousedown."+l,Aa=[],U=window,u=["moz","webkit","o"],na=0,M=0,Ba=u.length;M<Ba&&!ma;++M)ka=(ma=U[u[M]+"CancelAnimationFrame"]||U[u[M]+"CancelRequestAnimationFrame"])&&U[u[M]+"RequestAnimationFrame"];ma||(ka=function(f){var h=+new Date,m=Math.max(0,16-(h-na));na=h+m;return U.setTimeout(function(){f(h+m)},m)},ma=function(f){clearTimeout(f)});var u=function(f){for(var h=0,m=ba.length;h<m;h++){var l=ba[h]?ba[h]+f.charAt(0).toUpperCase()+f.slice(1):f;if(Ca.style[l]!==
sa)return l}},ba=["","webkit","moz","ms","o"],Ca=document.createElement("div");H=u("transform");la=u("perspective")?"translateZ(0) ":"";y.Sly=oa;h.fn.sly=function(f,u){var m,w;if(!h.isPlainObject(f)){if("string"===Q(f)||!1===f)m=!1===f?"destroy":f,w=Array.prototype.slice.call(arguments,1);f={}}return this.each(function(H,y){var z=h.data(y,l);!z&&!m?h.data(y,l,(new oa(y,f,u)).init()):z&&m&&z[m]&&z[m].apply(z,w)})};oa.defaults={horizontal:0,itemNav:null,itemSelector:null,smart:0,activateOn:null,activateMiddle:0,
scrollSource:null,scrollBy:0,dragSource:null,mouseDragging:0,touchDragging:0,releaseSwing:0,swingSpeed:0.2,elasticBounds:0,scrollBar:null,dragHandle:0,dynamicHandle:0,minHandleSize:50,clickBar:0,syncSpeed:0.5,pagesBar:null,activatePageOn:null,pageBuilder:function(f){return"<li>"+(f+1)+"</li>"},forward:null,backward:null,prev:null,next:null,prevPage:null,nextPage:null,cycleBy:null,cycleInterval:5E3,pauseOnHover:0,startPaused:0,moveBy:300,speed:0,easing:"swing",startAt:0,keyboardNavBy:null,draggedClass:"dragged",
activeClass:"active",disabledClass:"disabled"}})(jQuery,window);
