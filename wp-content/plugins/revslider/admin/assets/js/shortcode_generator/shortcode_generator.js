/*!
 * REVOLUTION 6.1.6 
 * @version: 1.0 (29.11.2019)
 * @author ThemePunch
*/
window.RVS=void 0===window.RVS?{}:window.RVS,RVS.F=void 0===RVS.F?{}:RVS.F,RVS.ENV=void 0===RVS.ENV?{}:RVS.ENV,RVS.LIB=void 0===RVS.LIB?{}:RVS.LIB,RVS.V=void 0===RVS.V?{}:RVS.V,RVS.S=void 0===RVS.S?{}:RVS.S,RVS.C=void 0===RVS.C?{}:RVS.C,RVS.WIN=void 0===RVS.WIN?jQuery(window):RVS.WIN,RVS.DOC=void 0===RVS.DOC?jQuery(document):RVS.DOC,RVS.OZ=void 0===RVS.OZ?{}:RVS.OZ,RVS.SC=void 0===RVS.SC?{}:RVS.SC,function(){RVS.V.sizes=null==RVS.V.sizes?["d","n","t","m"]:RVS.V.sizes,RVS.V.dirs=null==RVS.V.dirs?["top","bottom","left","right"]:RVS.V.dirs,RVS.V.dirN=null==RVS.V.dirN?{t:"top",b:"bottom",l:"left",r:"right"}:RVS.V.dirN,RVS.SC=RS_SC_WIZARD={init:function(){if("undefined"!=typeof QTags){var e=!0;if("undefined"!=typeof edButtons)for(var t in edButtons)edButtons.hasOwnProperty(t)&&!1!==e&&"slider-revolution"==edButtons[t].id&&(e=!1);e&&QTags.addButton("slider-revolution","Slider Revolution",(function(){RVS.SC.openTemplateLibrary("qtags")}))}void 0!==RVS.LIB.OBJ&&RVS.LIB.OBJ&&RVS.LIB.OBJ.items&&RVS.LIB.OBJ.items.length&&(RVS.SC.defaultAlias=RVS.LIB.OBJ.items[0].alias),"undefined"!=typeof elementor&&void 0!==elementor.hooks&&(elementor.hooks.addAction("panel/open_editor/widget/slider_revolution",(function(e,t,o){RVS.SC.type="elementor",RVS.SC.EL=void 0===RVS.SC.EL?{}:RVS.SC.EL,RVS.SC.EL.control=e.$el.find("#elementor-controls"),RVS.SC.EL.view=o,RVS.SC.EL.model=t,void 0!==o&&void 0!==o.container&&void 0!==o.container.settings&&void 0!==o.container.settings.attributes&&void 0!==o.container.settings.attributes.shortcode&&(RVS.SC.BLOCK=RVS.SC.scToBlock(o.container.settings.attributes.shortcode),void 0!==o.container.settings.attributes.revslidertitle&&(RVS.SC.BLOCK.slidertitle=o.container.settings.attributes.revslidertitle),void 0!==o.container.settings.attributes.modal&&(RVS.SC.BLOCK.modal=o.container.settings.attributes.modal)),jQuery(".elementor-component-tab.elementor-panel-navigation-tab.elementor-tab-control-advanced").hide(),RVS.SC.EL.control.addClass("rs-elementor-component-tab")})),window.elementorSelectRevSlider=function(e){e?RVS.SC.openTemplateLibrary("elementor"):jQuery('button[data-event="themepunch.selectslider"]').trigger("click")},RVS.DOC.on("click",'button[data-event="themepunch.selectslider"]',(function(){RVS.SC.openTemplateLibrary("elementor")})),RVS.DOC.on("click",'button[data-event="themepunch.settingsslider"]',(function(){RVS.SC.openBlockSettings("elementor",void 0!==RVS.SC.EL.view&&void 0!==RVS.SC.EL.view.container&&void 0!==RVS.SC.EL.view.container.settings&&void 0!==RVS.SC.EL.view.container.settings.attributes&&void 0!==RVS.SC.EL.view.container.settings.attributes.shortcode?RVS.SC.EL.view.container.settings.attributes.shortcode:{})})),RVS.DOC.on("click",'button[data-event="themepunch.editslider"]',(function(){RVS.SC.openSliderEditor(RVS.SC.BLOCK.alias)})),RVS.DOC.on("click",'button[data-event="themepunch.optimizeslider"]',(function(){RVS.SC.openOptimizer(RVS.SC.BLOCK.alias)}))),function(){function e(e){var t=jQuery.extend(!0,{},e),o='[rev_slider alias="'+t.alias+'"';return void 0!==t.slidertitle?o+=' slidertitle="'+t.slidertitle+'"':void 0!==t.sliderTitle?o+=' slidertitle="'+t.sliderTitle+'"':void 0!==t.title&&(o+=' slidertitle="'+t.title+'"'),void 0!==t.modal&&(o+=' modal="'+t.modal+'"'),void 0!==t.usage&&(o+=' usage="'+t.usage+'"'),void 0!==t.offset&&(o+=' offset="'+t.offset+'"'),void 0!==t.zindex&&(o+=' zindex="'+t.zindex+'"'),void 0!==t.layout&&(o+=' layout="'+t.layout+'"'),o+="][/rev_slider]"}function t(t){jQuery(".wpb-element-edit-modal").hide(),jQuery("#vc_properties-panel").hide(),RVS.SC.BLOCK=RVS.SC.scToBlock(e(t)),RVS.SC.openTemplateLibrary("wpbackery")}if("undefined"==typeof vc||null==vc)return;if(window.VcSliderRevolution=vc.shortcode_view.extend({events:{"click > .vc_controls .vc_control_rev_optimizer":"rs_optim","click > .vc_controls .vc_control_rev_selector":"rs_select","click > .vc_controls .vc_control_rev_settings":"rs_settings","click .column_delete,.vc_control-btn-delete":"deleteShortcode","click .vc_control-btn-edit":"editElement","click .column_clone,.vc_control-btn-clone":"clone",mousemove:"checkControlsPosition"},initialize:function(){return window.VcSliderRevolution.__super__.initialize.call(this)},render:function(){return RVS.SC.VC=this,vc.add_element_block_view.$el.is(":visible")&&t(this.model.get("params")),window.VcSliderRevolution.__super__.render.call(this)},editElement:function(){RVS.SC.openSliderEditor(this.model.get("params").alias)},rs_select:function(){RVS.SC.VC=this,t(this.model.get("params"))},rs_optim:function(){RVS.SC.openOptimizer(this.model.get("params").alias)},rs_settings:function(){RVS.SC.VC=this,RVS.SC.openBlockSettings("wpbackery",e(this.model.get("params")))}}),void 0!==window.InlineShortcodeView){var o=!1;jQuery(window).on("vc_build",(function(){vc.add_element_block_view.$el.find('[data-element="rev_slider"]').on("click",(function(){o=!0}))})),window.InlineShortcodeView_rev_slider=window.InlineShortcodeView.extend({events:{"click > .vc_controls .vc_control_rev_optimizer":"rs_optim","click > .vc_controls .vc_control_rev_selector":"rs_select","click > .vc_controls .vc_control_rev_settings":"rs_settings","click .column_delete,.vc_control-btn-delete":"destroy","click .vc_control-btn-edit":"edit",mousemove:"checkControlsPosition"},render:function(){RVS.SC.VC=this,o&&t(this.model.get("params")),window.InlineShortcodeView_rev_slider.__super__.render.call(this);var e=this.$controls.find(".vc_element-move");return 0===this.$controls[0].getElementsByClassName("vc_control_rev_optimizer").length&&jQuery('<a class="vc_control-btn vc_control_rev_optimizer" href="#" title="File Size Optimizer"><span class="vc_btn-content"><i class="revslider_vc_material-icons material-icons">flash_on</i></span></a>').insertAfter(e),0===this.$controls[0].getElementsByClassName("vc_control_rev_settings").length&&jQuery('<a class="vc_control-btn vc_control_rev_settings" href="#" title="Module Settings"><span class="vc_btn-content"><i class="revslider_vc_material-icons material-icons">tune</i></span></a>').insertAfter(e),0===this.$controls[0].getElementsByClassName("vc_control_rev_selector").length&&jQuery('<a class="vc_control-btn vc_control_rev_selector" href="#" title="Select New Slider Revolution 6 Module"><span class="vc_btn-content"><i class="revslider_vc_material-icons material-icons">cached</i></span></a>').insertAfter(e),0===this.$controls[0].getElementsByClassName("vc_control_rev_edit").length&&e.find(".vc_control-btn.vc_control-btn-edit").addClass("vc_control_rev_edit"),this.$controls.find(".vc_control-btn-clone").hide(),this},rs_settings:function(){return RVS.SC.VC=this,RVS.SC.openBlockSettings("wpbackery",e(this.model.get("params"))),!1},rs_optim:function(){return RVS.SC.openOptimizer(this.model.get("params").alias),!1},update:function(e){return o=!1,window.InlineShortcodeView_rev_slider.__super__.update.call(this,e),this},edit:function(){return RVS.SC.openSliderEditor(this.model.get("params").alias),!1},rs_select:function(){return RVS.SC.VC=this,t(this.model.get("params")),!1}})}RVS.DOC.on("mouseenter",".wpb_rev_slider.wpb_content_element.wpb_sortable",(function(){var e=jQuery(this.getElementsByClassName("vc_controls-cc")[0]);if(void 0!==e){var t=e.find(".vc_element-move");0===this.getElementsByClassName("vc_control_rev_optimizer").length&&jQuery('<a class="vc_control-btn vc_control_rev_optimizer" href="#" title="File Size Optimizer"><span class="vc_btn-content"><i class="revslider_vc_material-icons material-icons">flash_on</i></span></a>').insertAfter(t),0===this.getElementsByClassName("vc_control_rev_settings").length&&jQuery('<a class="vc_control-btn vc_control_rev_settings" href="#" title="Module Settings"><span class="vc_btn-content"><i class="revslider_vc_material-icons material-icons">tune</i></span></a>').insertAfter(t),0===this.getElementsByClassName("vc_control_rev_selector").length&&jQuery('<a class="vc_control-btn vc_control_rev_selector" href="#" title="Select New Slider Revolution 6 Module"><span class="vc_btn-content"><i class="revslider_vc_material-icons material-icons">cached</i></span></a>').insertAfter(t),0===this.getElementsByClassName("vc_control_rev_edit").length&&t.find(".vc_control-btn.vc_control-btn-edit").addClass("vc_control_rev_edit")}}))}(),function(){if(void 0!==RVS.S.shortCodeListener)return;RVS.S.shortCodeListener=!0,jQuery(document.body).on("click","#objectlibrary *[data-folderid]",(function(){RVS.F.setCookie("rs6_wizard_folder",this.dataset.folderid,360)}));var e=document.getElementById("slide_template_row");null!==e&&(e.style.display="inline-block",RVS.F.initOnOff(e));RVS.DOC.on("click",".rs_lib_premium_red",RVS.F.showRegisterSliderInfo),RVS.DOC.on("registrationdone",(function(){!1===RVS.ENV.activated?(jQuery(".rs_wp_plg_act_wrapper").show(),jQuery(".rb_not_on_notactive").addClass("disabled")):(jQuery(".rs_wp_plg_act_wrapper").hide(),jQuery(".rb_not_on_notactive").removeClass("disabled"))})),!1===RVS.ENV.activated?(jQuery(".rs_wp_plg_act_wrapper").show(),RVS.DOC.on("click",".rs_wp_plg_act_wrapper",RVS.F.showRegisterSliderInfo)):jQuery(".rs_wp_plg_act_wrapper").hide();function t(e){if(void 0===e||void 0===e.options)return!1;var t=!1;for(var o in e.options)e.options.hasOwnProperty(o)&&!t&&(t="../public/views/revslider-page-template.php"===e.options[o].value);return t}function n(){var e=document.getElementsByClassName("components-select-control__input"),o=!1;for(var i in e)e.hasOwnProperty(i)&&!1===o&&t(e[i])&&(o=e[i]);return o}jQuery("#rs_page_bg_color").rsColorPicker({init:function(e,t,o,i){var n=jQuery('<input type="text" class="layerinput" value="'+t.val()+'">').appendTo(e);t.data("ghost",n).hide()},change:function(e,t,o,i,n){e.data("ghost").val(t),e.val(t)}}),jQuery(document.body).on("change",".components-select-control__input, .editor-page-attributes__template select",(function(){t(this)&&("../public/views/revslider-page-template.php"===this.value?(jQuery("#rs_page_bg_color_column").show(),jQuery("#rs_blank_template").prop("checked",!0),jQuery("#slide_template_row .tponoffwrap").removeClass("off")):(jQuery("#rs_page_bg_color_column").hide(),jQuery("#rs_blank_template").prop("checked",!1),jQuery("#slide_template_row .tponoffwrap").addClass("off")))})),jQuery(document.body).on("change","#rs_blank_template",(function(){var e=n();e=!1===e?jQuery(".editor-page-attributes__template select"):jQuery(e),jQuery(this).prop("checked")?(e.val("../public/views/revslider-page-template.php").change(),jQuery("#rs_page_bg_color_column").show()):(e.val("").change(),jQuery("#rs_page_bg_color_column").hide())})),RVS.DOC.on("click",".block-editor-editor-skeleton__content, .interface-interface-skeleton__content",(function(){RVS.SC.updateBlockViews(!0)})),RVS.DOC.on("addRevSliderShortcode",(function(e,t){if(void 0!==t&&"-1"!==t.alias){t.size=""===t.size||void 0===t.size?"auto":t.size;var i=o(t.alias);RVS.SC.BLOCK=jQuery.extend(!0,i,RVS.SC.BLOCK),RVS.SC.BLOCK.alias=t.alias,RVS.SC.BLOCK.slidertitle=void 0!==t.slidertitle?t.slidertitle:void 0!==t.title?t.title:t.alias,RVS.SC.BLOCK.layout=RVS.SC.BLOCK.origlayout=t.size,RVS.SC.updateShortCode()}})),RVS.DOC.on("selectRevSliderItem",(function(){var e=RVS.F.getCookie("rs6_wizard_folder");e&&-1!==e&&"-1"!==e&&RVS.F.changeOLIBToFolder(e)})),RVS.DOC.on("click","#rbm_blocksettings .rbm_close",(function(){RVS.SC.updateShortCode(),RVS.F.RSDialog.close()})),RVS.DOC.on("focus",".scblockinput",(function(){this.dataset.focusvalue=this.value,this.style.opacity=1})),RVS.DOC.on("change blur",".scblockinput",(function(){void 0!==this.dataset.s&&this.dataset.focusvalue!==this.value&&(RVS.SC.BLOCK.offset[this.dataset.s].use=!0),i()})),RVS.DOC.on("updateSRBSSVREVT",(function(e,t){void 0!==t&&(""===t.val&&(RVS.SC.BLOCK.popup.event.v="popup_"+RVS.SC.BLOCK.alias),document.getElementById("srbs_scr_evt").innerHTML=t.val)}))}()},parseShortCode:function(e){if(void 0!==e){var t,o,i,n=/(\s+|\W)|(\w+)/g,s="",r="NOT STARTED",l={name:"",attributes:{},content:""},a=(e.match(/\]/g)||[]).length;if(2<a)throw'invalid shortCode: match more then 2 tokens "]". Use only shortcode with this function. Example "[name]teste[/name]" or "[name prop=value]"';for(a=1!==a;null!=(t=n.exec(e))&&(o=t[0],"COMPLETE"!==r);)switch(r){case"NOT STARTED":"["==o&&(r="GETNAME");break;case"GETNAME":/\s/.test(o)?l.name&&(r="PARSING"):/\]/.test(o)?r="GETCONTENT":l.name+=o;break;case"GETCONTENT":/\[/.test(o)?l.name&&(r="COMPLETE"):l.content+=o;break;case"PARSING":if("]"==o)r=1===a?"COMPLETE":"GETCONTENT";else if("="==o){if(!s)throw'invalid token: "'+o+'" encountered at '+t.index;r="GET ATTRIBUTE VALUE"}else/\s/.test(o)?s&&(r="SET ATTRIBUTE"):s+=o;break;case"SET ATTRIBUTE":if(/\s/.test(o))l.attributes[s]=null;else{if("="!=o)throw'invalid token: "'+o+'" encountered at '+t.index;r="GET ATTRIBUTE VALUE"}break;case"GET ATTRIBUTE VALUE":/\s/.test(o)||(r=/["']/.test(o)?(i=o,l.attributes[s]="","GET QUOTED ATTRIBUTE VALUE"):(l.attributes[s]=o,s="","PARSING"));break;case"GET QUOTED ATTRIBUTE VALUE":/\\/.test(o)?r="ESCAPE VALUE":o==i?(r="PARSING",s=""):l.attributes[s]+=o;break;case"ESCAPE VALUE":/\\'"/.test(o)?l.attributes[s]+=o:l.attributes[s]+="\\"+o,r="GET QUOTED ATTRIBUTE VALUE"}return s&&!l.attributes[s]&&(l.attributes[s]=""),l}},scToBlock:function(e){var t,i,n,s,r,l=RVS.SC.parseShortCode(e),a=void 0===l?{}:l.attributes,c=o(a.alias);if(void 0!==a.offset)for(i in t=a.offset.split(";"))if(""!==(s=t[i].split(":"))[0]&&void 0!==s[1])for(n in r=s[1].split(","))c.offset[RVS.V.sizes[n]][RVS.V.dirN[s[0]]]=r[n],c.offset[RVS.V.sizes[n]].use=!0;if(a.usage&&"modal"===a.usage&&(c.usage="modal",c.modal=!0,void 0!==a.modal))for(i in t=a.modal.split(";"))switch((s=t[i].split(":"))[0]){case"t":c.popup.time.use=!0,c.popup.time.v=s[1];break;case"s":c.popup.scroll.use=!0,c.popup.scroll.type="container",c.popup.scroll.container=s[1];break;case"so":c.popup.scroll.use=!0,c.popup.scroll.type="offset",c.popup.scroll.v=s[1];break;case"e":c.popup.event.use=!0,c.popup.event.v=s[1];break;case"ha":c.popup.hash.use=!0;break;case"co":c.popup.cookie.use=!0,c.popup.cookie.v=s[1]}return void 0!==a.zindex&&(c.zindex=a.zindex),void 0!==a.layout&&(c.layout=a.layout),void 0!==a.slidertitle?c.slidertitle=a.slidertitle:void 0!==a.sliderTitle?c.slidertitle=a.sliderTitle:void 0!==a.title&&(c.slidertitle=a.title),c},updateBlockViews:function(e){!0===e?jQuery(".rs_optimizer_button_wrapper").closest(".components-panel").addClass("rs_component_panel"):jQuery(".rs_component_panel").removeClass("rs_component_panel")},buildShortCode:function(){RVS.SC.BLOCK.content='[rev_slider alias="'+RVS.SC.BLOCK.alias+'"',RVS.SC.BLOCK.content+=' slidertitle="'+RVS.SC.BLOCK.slidertitle+'"',!1!==RVS.ENV.activated&&t(!0);var e="",o="";return!0===RVS.SC.BLOCK.modal?(o="modal",RVS.SC.BLOCK.content+=' usage="'+o+'"',void 0!==RVS.SC.BLOCK.popup&&!1!==RVS.ENV.activated&&(void 0!==RVS.SC.BLOCK.popup.time&&RVS.SC.BLOCK.popup.time.use&&(e+="t:"+RVS.SC.BLOCK.popup.time.v+";"),void 0!==RVS.SC.BLOCK.popup.scroll&&RVS.SC.BLOCK.popup.scroll.use&&("offset"===RVS.SC.BLOCK.popup.scroll.type?e+="so:"+RVS.SC.BLOCK.popup.scroll.v+";":e+="s:"+RVS.SC.BLOCK.popup.scroll.container+";"),void 0!==RVS.SC.BLOCK.popup.event&&RVS.SC.BLOCK.popup.event.use&&(e+="e:"+RVS.SC.BLOCK.popup.event.v+";"),void 0!==RVS.SC.BLOCK.popup.hash&&RVS.SC.BLOCK.popup.hash.use&&(e+="ha:t;"),void 0!==RVS.SC.BLOCK.popup.cookie&&RVS.SC.BLOCK.popup.cookie.use&&(e+="co:"+RVS.SC.BLOCK.popup.cookie.v+";"),""!==e&&(RVS.SC.BLOCK.content+=' modal="'+e+'"'))):!1!==RVS.ENV.activated&&(void 0!==RVS.SC.BLOCK.offsettext&&RVS.SC.BLOCK.offsettext.length>0?RVS.SC.BLOCK.content+=' offset="'+RVS.SC.BLOCK.offsettext+'"':RVS.SC.BLOCK.offsettext="",void 0!==RVS.SC.BLOCK.zindex&&""!==RVS.SC.BLOCK.zindex&&0!==RVS.SC.BLOCK.zindex&&(RVS.SC.BLOCK.content+=' zindex="'+RVS.SC.BLOCK.zindex+'"')),!1!==RVS.ENV.activated&&RVS.SC.BLOCK.layout!==RVS.SC.BLOCK.origlayout&&(RVS.SC.BLOCK.content+=' layout="'+RVS.SC.BLOCK.layout+'"'),RVS.SC.BLOCK.content+="][/rev_slider]",delete RVS.SC.BLOCK.text,{popup:e,usage:o}},updateShortCode:function(){if(void 0===RVS||void 0===RVS.SC||!RVS.SC.suppress){var e=RVS.SC.buildShortCode();switch(RVS.SC.type){case"wpbackery":var t=jQuery.extend(!0,{},RVS.SC.BLOCK);"modal"===e.usage?(t.usage=e.usage,t.modal=e.popup,delete t.offset,delete t.zimdex):(""!==t.offsettext?t.offset=RVS.SC.BLOCK.offsettext:delete t.offset,delete t.usage,delete t.modal),t.layout===t.origlayout&&delete t.layout,delete t.offsettext,delete t.origlayout,delete t.content,delete t.popup,RVS.SC.VC.model.save("params",t);break;case"tinymce":tinyMCE.activeEditor.selection.setContent(RVS.SC.BLOCK.content);break;case"elementor":RVS.SC.suppress=!0,RVS.SC.EL.model.setSetting("revslidertitle",RVS.SC.BLOCK.slidertitle),RVS.SC.EL.model.setSetting("shortcode",RVS.SC.BLOCK.content),RVS.SC.EL.control.find('input[data-setting="shortcode"]').trigger("input"),setTimeout((function(){RVS.SC.suppress=!1}),500);break;case"qtags":QTags.insertContent(RVS.SC.BLOCK.content);break;case"gutenberg":var o={slidertitle:RVS.SC.BLOCK.slidertitle,alias:RVS.SC.BLOCK.alias,modal:RVS.SC.BLOCK.modal,content:RVS.SC.BLOCK.content,zindex:RVS.SC.BLOCK.zindex,wrapperid:RVS.SC.BLOCK.wrapperid};revslider_react.setState(o),revslider_react.props.setAttributes(o),setTimeout((function(){revslider_react.forceUpdate()}),500);break;case"divi":revslider_divi.props._onChange(revslider_divi.props.name,RVS.SC.BLOCK.content),revslider_divi.setState(RVS.SC.BLOCK)}}},openTemplateLibrary:function(e){if(void 0!==RVS.LIB.OBJ){if("tinymce"===e&&(RVS.SC.BLOCK={}),RVS.SC.type=e,!RVS.SC.libraryInited){RVS.SC.libraryInited=!0,RVS.F.initObjectLibrary(!0);var t=document.getElementById("obj_addsliderasmodal");null!==t&&(t.style.display="inline-block",RVS.F.initOnOff(t)),jQuery(document.body).on("change","#sel_olibrary_sorting",(function(){jQuery("#reset_objsorting").css("datedesc"===this.value?{display:"none"}:{display:"inline-block",opacity:"1",visibility:"visible"}),void 0!==this.dataset.evt&&RVS.DOC.trigger(this.dataset.evt,this.dataset.evtparam)})).on("change","#ol_pagination",(function(e){void 0!==this.dataset.evt&&RVS.DOC.trigger(this.dataset.evt,[e,this.value,this.dataset.evtparam])}))}jQuery("#obj_addsliderasmodal .tponoffwrap").addClass("off").find("input").prop("checked",!1),RVS.F.openObjectLibrary({types:["modules"],filter:"all",selected:["modules"],success:{modules:"addRevSliderShortcode",event:"selectRevSliderItem"}});var o=RVS.F.getCookie("rs6_wizard_folder");o&&-1!==o&&"-1"!==o&&void 0!==RVS.LIB.OBJ&&void 0!==RVS.LIB.OBJ.items&&void 0!==RVS.LIB.OBJ.items.modules&&RVS.F.changeOLIBToFolder(o)}},openBlockSettings:function(e,t){void 0!==RVS&&void 0!==RVS.SC&&(!0!==RVS.ENV.activated&&RVS.F.showRegisterSliderInfo(),void 0===t&&void 0===RVS.SC.BLOCK||(RVS.SC.BLOCK=void 0!==t?RVS.SC.scToBlock(t):void 0===RVS.SC.BLOCK||void 0===RVS.SC.BLOCK.text?RVS.SC.scToBlock(RVS.SC.BLOCK.content):RVS.SC.scToBlock(RVS.SC.BLOCK.text),void 0!==RVS&&void 0!==RVS.SC&&void 0!==RVS.SC.BLOCK&&RVS.SC.BLOCK.alias.length>0&&(RVS.SC.type=e,RVS.F.ajaxRequest("getSliderSizeLayout",{alias:RVS.SC.BLOCK.alias},(function(e){e.success&&(void 0!==e&&void 0!==e.layout&&(e.layout=void 0===e.layout||""===e.layout?"auto":e.layout,RVS.SC.BLOCK.origlayout=e.layout,RVS.SC.BLOCK.slidertitle=void 0!==e.slidertitle?e.slidertitle:void 0!==e.sliderTitle?e.sliderTitle:void 0!==e.title?e.title:RVS.SC.BLOCK.slidertitle,void 0!==RVS.SC.BLOCK.layout&&""!==RVS.SC.BLOCK.layout||(RVS.SC.BLOCK.layout=RVS.SC.BLOCK.origlayout)),RVS.F.showWaitAMinute({fadeOut:0,text:RVS_LANG.loadingcontent}),RVS.C.RBBS=jQuery("#rbm_blocksettings"),RVS.F.initOnOff(RVS.C.RBBS),RVS.F.RSDialog.create({modalid:"#rbm_blocksettings",bgopacity:.5}),RVS.C.RBBS.RSScroll({wheelPropagation:!1,suppressScrollX:!0}),RVS.C.RBBS.find(".origlayout").hide(),RVS.C.RBBS.find(".origlayout.origlayout_"+RVS.SC.BLOCK.origlayout).show(),RVS.F.RSDialog.center(),setTimeout(RVS.F.RSDialog.center,19),setTimeout(RVS.F.RSDialog.center,50),setTimeout(RVS.F.RSDialog.center,400),i())})))))},openSliderEditor:function(e){void 0!==e&&e.length>0&&window.open(RVS.ENV.admin_url+"&view=slide&alias="+e)},openOptimizer:function(e){void 0!==e&&e.length>0&&RVS.F.openOptimizer({alias:e})}};var e=!1;function t(e){if(null!=RVS&&null!=RVS.SC.BLOCK&&void 0!==RVS.SC.BLOCK.offset){var t,o,i,n,s,r={top:0,bottom:0,left:0,right:0},l="";for(var a in RVS.V.dirs){for(var c in i=RVS.V.dirs[a],n=!1,l+=RVS.V.dirs[a][0]+":",RVS.V.sizes){if(s="d"==(o=RVS.V.sizes[c])&&(RVS.SC.BLOCK.offset.d.use||RVS.SC.BLOCK.offset.n.use||RVS.SC.BLOCK.offset.t.use||RVS.SC.BLOCK.offset.n.use)||"n"==o&&(RVS.SC.BLOCK.offset.n.use||RVS.SC.BLOCK.offset.t.use||RVS.SC.BLOCK.offset.n.use)||"t"==o&&(RVS.SC.BLOCK.offset.t.use||RVS.SC.BLOCK.offset.m.use)||"m"==o&&RVS.SC.BLOCK.offset.m.use,n&&s&&(l+=","),n=!0,!0!==e){var d=jQuery("#rbm_blocksettings .scblockinput[data-r='offset."+o+"."+i+"']");if(void 0===d[0])continue;d[0].dataset.s=o}RVS.SC.BLOCK.offset[o].use?(r[i]=t=RVS.SC.BLOCK.offset[o][i],!0!==e&&(d[0].style.opacity=1)):(t=r[i],!0!==e&&(d[0].style.opacity=.5)),!0!==e&&(d[0].value=t),s?l+=t:n=!1}l+=";"}"t:;b:;l:;r:;"===l&&(l=""),RVS.SC.BLOCK.offsettext=l}}function o(e){return e=void 0===e?"":e,new Object({alias:e,zindex:0,popup:{time:{use:!1,v:2e3},scroll:{use:!1,type:"offset",v:2e3,container:""},event:{use:!1,v:"popup_"+e},hash:{use:!1},cookie:{use:!1,v:24}},offset:{d:{top:"0px",bottom:"0px",left:"0px",right:"0px",use:!1},n:{top:"0px",bottom:"0px",left:"0px",right:"0px",use:!1},t:{top:"0px",bottom:"0px",left:"0px",right:"0px",use:!1},m:{top:"0px",bottom:"0px",left:"0px",right:"0px",use:!1}},modal:!1})}function i(){RVS.F.updateEasyInputs({path:"SC.BLOCK.",container:"#rbm_blocksettings",root:RVS}),RVS.F.updateAllOnOff(),t(),jQuery(".scblockinput").trigger("init"),void 0!==RVS.SC.BLOCK.popup&&(document.getElementById("srbs_scr_evt").innerHTML=RVS.SC.BLOCK.popup.event.v,document.getElementById("srbs_scr_hash").innerHTML=RVS.SC.BLOCK.alias,!1!==RVS.ENV.activated?jQuery(".rb_not_on_notactive").removeClass("disabled"):jQuery(".rb_not_on_notactive").addClass("disabled"))}"loading"===document.readyState?document.addEventListener("readystatechange",(function(){"interactive"!==document.readyState&&"complete"!==document.readyState||e||(e=!0,RVS.SC.init())})):(e=!0,RVS.SC.init())}();