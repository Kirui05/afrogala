"use strict";(globalThis.webpackChunk_wcAdmin_webpackJsonp=globalThis.webpackChunk_wcAdmin_webpackJsonp||[]).push([[7170],{14243:(e,t,r)=>{r.d(t,{Z:()=>_});var a=r(69307),o=r(94333),n=r(69596),s=r.n(n),i=r(92819),c=r(9818),l=r(75606),d=r(86020),m=r(67221),u=r(81921),p=r(14599),g=r(17844),h=r(88679);class y extends a.Component{constructor(){super(),this.onDateSelect=this.onDateSelect.bind(this),this.onFilterSelect=this.onFilterSelect.bind(this),this.onAdvancedFilterAction=this.onAdvancedFilterAction.bind(this)}onDateSelect(e){const{report:t,addCesSurveyForAnalytics:r}=this.props;r(),(0,p.recordEvent)("datepicker_update",{report:t,...(0,i.omitBy)(e,i.isUndefined)})}onFilterSelect(e){const{report:t,addCesSurveyForAnalytics:r}=this.props,a=e.filter||e["filter-variations"];["single_product","single_category","single_coupon","single_variation"].includes(a)&&r();const o={report:t,filter:e.filter||"all"};"single_product"===e.filter&&(o.filter_variation=e["filter-variations"]||"all"),(0,p.recordEvent)("analytics_filter",o)}onAdvancedFilterAction(e,t){const{report:r,addCesSurveyForAnalytics:a}=this.props;switch(e){case"add":(0,p.recordEvent)("analytics_filters_add",{report:r,filter:t.key});break;case"remove":(0,p.recordEvent)("analytics_filters_remove",{report:r,filter:t.key});break;case"filter":const e=Object.keys(t).reduce(((e,r)=>(e[(0,i.snakeCase)(r)]=t[r],e)),{});a(),(0,p.recordEvent)("analytics_filters_filter",{report:r,...e});break;case"clear_all":(0,p.recordEvent)("analytics_filters_clear_all",{report:r});break;case"match":(0,p.recordEvent)("analytics_filters_all_any",{report:r,value:t.match})}}render(){const{advancedFilters:e,filters:t,path:r,query:o,showDatePicker:n,defaultDateRange:s}=this.props,{period:i,compare:c,before:l,after:m}=(0,u.getDateParamsFromQuery)(o,s),{primary:p,secondary:g}=(0,u.getCurrentDates)(o,s),y={period:i,compare:c,before:l,after:m,primaryDate:p,secondaryDate:g},_=this.context;return(0,a.createElement)(d.ReportFilters,{query:o,siteLocale:h.MV.siteLocale,currency:_.getCurrencyConfig(),path:r,filters:t,advancedFilters:e,showDatePicker:n,onDateSelect:this.onDateSelect,onFilterSelect:this.onFilterSelect,onAdvancedFilterAction:this.onAdvancedFilterAction,dateQuery:y,isoDateFormat:u.isoDateFormat})}}y.contextType=g.CurrencyContext;const _=(0,o.compose)((0,c.withSelect)((e=>{const{woocommerce_default_date_range:t}=e(m.SETTINGS_STORE_NAME).getSetting("wc_admin","wcAdminSettings");return{defaultDateRange:t}})),(0,c.withDispatch)((e=>{const{addCesSurveyForAnalytics:t}=e(l.STORE_KEY);return{addCesSurveyForAnalytics:t}})))(y);y.propTypes={advancedFilters:s().object,filters:s().array,path:s().string.isRequired,query:s().object,showDatePicker:s().bool,report:s().string.isRequired}},46613:(e,t,r)=>{r.d(t,{Z:()=>v});var a=r(29346),o=r(69307),n=r(55609),s=r(92694),i=r(94333),c=r(45904),l=r(9818),d=r(92819),m=r(65736),u=r(69596),p=r.n(u),g=r(75606),h=r(86020),y=r(10431),_=r(49742),b=r(67221),f=r(14599);const w=()=>(0,o.createElement)("svg",{role:"img","aria-hidden":"true",focusable:"false",version:"1.1",xmlns:"http://www.w3.org/2000/svg",x:"0px",y:"0px",viewBox:"0 0 24 24"},(0,o.createElement)("path",{d:"M18,9c-0.009,0-0.017,0.002-0.025,0.003C17.72,5.646,14.922,3,11.5,3C7.91,3,5,5.91,5,9.5c0,0.524,0.069,1.031,0.186,1.519 C5.123,11.016,5.064,11,5,11c-2.209,0-4,1.791-4,4c0,1.202,0.541,2.267,1.38,3h18.593C22.196,17.089,23,15.643,23,14 C23,11.239,20.761,9,18,9z M12,16l-4-5h3V8h2v3h3L12,16z"})),S=e=>{const{getHeadersContent:t,getRowsContent:r,getSummary:i,isRequesting:l,primaryData:u={},tableData:p={items:{data:[],totalResults:0},query:{}},endpoint:g,itemIdField:S,tableQuery:C={},compareBy:E,compareParam:v="filter",searchBy:F,labels:R={},...k}=e,{query:D,columnPrefsKey:q}=e,{items:x,query:A}=p,T=D[v]?(0,y.getIdsFromQuery)(D[E]):[],[N,P]=(0,o.useState)(T),Q=(0,o.useRef)(null),{updateUserPreferences:B,...I}=(0,b.useUserPreferences)();if(p.isError||u.isError)return(0,o.createElement)(h.AnalyticsError,null);let O=[];q&&(O=I&&I[q]?I[q]:O);const j=(e,a,o)=>{const n=i?i(a,o):null;return(0,s.applyFilters)("woocommerce_admin_report_table",{endpoint:g,headers:t(),rows:r(e),totals:a,summary:n,items:x})},M=t=>{const{ids:r}=e;P(t?r:[])},V=(t,r)=>{const{ids:a}=e;if(r)P((0,d.uniq)([a[t],...N]));else{const e=N.indexOf(a[t]);P([...N.slice(0,e),...N.slice(e+1)])}},L=t=>{const{ids:r=[]}=e,a=-1!==N.indexOf(r[t]);return{display:(0,o.createElement)(n.CheckboxControl,{onChange:(0,d.partial)(V,t),checked:a}),value:!1}},U=l||p.isRequesting||u.isRequesting,K=(0,d.get)(u,["data","totals"],{}),Y=x.totalResults||0,z=Y>0,Z=(0,y.getSearchWords)(D).map((e=>({key:e,label:e}))),{data:G}=x,H=j(G,K,Y);let{headers:J,rows:W}=H;const{summary:X}=H;E&&(W=W.map(((e,t)=>[L(t),...e])),J=[(()=>{const{ids:t=[]}=e,r=t.length>0,a=r&&t.length===N.length;return{cellClassName:"is-checkbox-column",key:"compare",label:(0,o.createElement)(n.CheckboxControl,{onChange:M,"aria-label":(0,m.__)("Select All","woocommerce"),checked:a,disabled:!r}),required:!0}})(),...J]);const $=((e,t)=>t?e.map((e=>({...e,visible:e.required||!t.includes(e.key)}))):e.map((e=>({...e,visible:e.required||!e.hiddenByDefault}))))(J,O);return(0,o.createElement)(o.Fragment,null,(0,o.createElement)("div",{className:"woocommerce-report-table__scroll-point",ref:Q,"aria-hidden":!0}),(0,o.createElement)(h.TableCard,(0,a.Z)({className:"woocommerce-report-table",hasSearch:!!F,actions:[E&&(0,o.createElement)(h.CompareButton,{key:"compare",className:"woocommerce-table__compare",count:N.length,helpText:R.helpText||(0,m.__)("Check at least two items below to compare","woocommerce"),onClick:()=>{E&&(0,y.onQueryChange)("compare")(E,v,N.join(","))},disabled:!z},R.compareButton||(0,m.__)("Compare","woocommerce")),F&&(0,o.createElement)(h.Search,{allowFreeTextSearch:!0,inlineTags:!0,key:"search",onChange:t=>{const{baseSearchQuery:r={},addCesSurveyForCustomerSearch:a}=e,o=t.map((e=>e.label.replace(",","%2C")));o.length?((0,y.updateQueryString)({filter:void 0,[v]:void 0,[F]:void 0,...r,search:(0,d.uniq)(o).join(",")}),a()):(0,y.updateQueryString)({search:void 0}),(0,f.recordEvent)("analytics_table_filter",{report:g})},placeholder:R.placeholder||(0,m.__)("Search by item name","woocommerce"),selected:Z,showClearButton:!0,type:F,disabled:!z}),z&&(0,o.createElement)(n.Button,{key:"download",className:"woocommerce-table__download-button",disabled:U,onClick:()=>{const{createNotice:t,startExport:r,title:a}=e,o=Object.assign({},D),{data:n,totalResults:s}=x;let i="browser";if(delete o.extended_info,o.search&&delete o[F],n&&n.length===s){const{headers:e,rows:t}=j(n,s);(0,_.downloadCSVFile)((0,_.generateCSVFileName)(a,o),(0,_.generateCSVDataFromTable)(e,t))}else i="email",r(g,A).then((()=>t("success",(0,m.sprintf)((0,m.__)("Your %s Report will be emailed to you.","woocommerce"),a)))).catch((e=>t("error",e.message||(0,m.sprintf)((0,m.__)("There was a problem exporting your %s Report. Please try again.","woocommerce"),a))));(0,f.recordEvent)("analytics_table_download",{report:g,rows:s,download_type:i})}},(0,o.createElement)(w,null),(0,o.createElement)("span",{className:"woocommerce-table__download-button__label"},R.downloadButton||(0,m.__)("Download","woocommerce")))],headers:$,isLoading:U,onQueryChange:y.onQueryChange,onColumnsChange:(e,t)=>{const r=J.map((e=>e.key)).filter((t=>!e.includes(t)));if(q&&B({[q]:r}),t){const r={report:g,column:t,status:e.includes(t)?"on":"off"};(0,f.recordEvent)("analytics_table_header_toggle",r)}},onSort:(e,t)=>{(0,y.onQueryChange)("sort")(e,t);const r={report:g,column:e,direction:t};(0,f.recordEvent)("analytics_table_sort",r)},onPageChange:(e,t)=>{Q.current.scrollIntoView();const r=Q.current.nextSibling.querySelector(".woocommerce-table__table"),a=c.focus.focusable.find(r);a.length&&a[0].focus(),t&&("goto"===t?(0,f.recordEvent)("analytics_table_go_to_page",{report:g,page:e}):(0,f.recordEvent)("analytics_table_page_click",{report:g,direction:t}))},rows:W,rowsPerPage:parseInt(A.per_page,10)||b.QUERY_DEFAULTS.pageSize,summary:X,totalRows:Y},k)))};S.propTypes={baseSearchQuery:p().object,compareBy:p().string,compareParam:p().string,columnPrefsKey:p().string,endpoint:p().string,extendItemsMethodNames:p().shape({getError:p().string,isRequesting:p().string,load:p().string}),extendedItemsStoreName:p().string,getHeadersContent:p().func.isRequired,getRowsContent:p().func.isRequired,getSummary:p().func,itemIdField:p().string,labels:p().shape({compareButton:p().string,downloadButton:p().string,helpText:p().string,placeholder:p().string}),primaryData:p().object,searchBy:p().string,summaryFields:p().arrayOf(p().string),tableData:p().object,tableQuery:p().object,title:p().string.isRequired};const C=[],E={},v=(0,i.compose)((0,l.withSelect)(((e,t)=>{const{endpoint:r,getSummary:a,isRequesting:o,itemIdField:n,query:s,tableData:i,tableQuery:c,filters:l,advancedFilters:m,summaryFields:u,extendedItemsStoreName:p}=t,g=e(b.REPORTS_STORE_NAME),h=p?e(p):null,{woocommerce_default_date_range:y}=e(b.SETTINGS_STORE_NAME).getSetting("wc_admin","wcAdminSettings"),_=s.search&&!(s[r]&&s[r].length);if(o||_)return E;const f="categories"===r?"products":r,w=a?(0,b.getReportChartData)({endpoint:f,selector:g,dataType:"primary",query:s,filters:l,advancedFilters:m,defaultDateRange:y,fields:u}):E,S=i||(0,b.getReportTableData)({endpoint:r,query:s,selector:g,tableQuery:c,filters:l,advancedFilters:m,defaultDateRange:y}),v=h?function(e,t,r){const{extendItemsMethodNames:a,itemIdField:o}=t,n=r.items.data;if(!(Array.isArray(n)&&n.length&&a&&o))return r;const{[a.getError]:s,[a.isRequesting]:i,[a.load]:c}=e,l={include:n.map((e=>e[o])).join(","),per_page:n.length},m=c(l),u=!!i&&i(l),p=!!s&&s(l),g=n.map((e=>{const t=(0,d.first)(m.filter((t=>e.id===t.id)));return{...e,...t}})),h=r.isRequesting||u,y=r.isError||p;return{...r,isRequesting:h,isError:y,items:{...r.items,data:g}}}(h,t,S):S;return{primaryData:w,ids:n&&v.items.data?v.items.data.map((e=>e[n])):C,tableData:v,query:s}})),(0,l.withDispatch)((e=>{const{startExport:t}=e(b.EXPORT_STORE_NAME),{createNotice:r}=e("core/notices"),{addCesSurveyForCustomerSearch:a}=e(g.STORE_KEY);return{createNotice:r,startExport:t,addCesSurveyForCustomerSearch:a}})))(S)}}]);