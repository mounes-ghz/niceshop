import{n as i}from"./_plugin-vue2_normalizer-Dh-dUdSv-v4.3.2.js";const n={props:{totalPage:Number,currentPage:Number,rangeMax:{type:Number,default:3}},mounted(){this.currentPage>this.totalPage&&this.$emit("page-changed",this.totalPage)},computed:{rangeFirstPage(){return this.currentPage===1?1:this.currentPage===this.totalPage?this.totalPage-this.rangeMax<0?1:this.totalPage-this.rangeMax+1:this.currentPage-1},rangeLastPage(){return Math.min(this.rangeFirstPage+this.rangeMax-1,this.totalPage)},range(){let e=[];for(let a=this.rangeFirstPage;a<=this.rangeLastPage;a+=1)e.push(a);return e},hasFirst(){return this.currentPage===1},hasLast(){return this.currentPage===this.totalPage}},methods:{prev(){this.$emit("page-changed",this.currentPage-1)},next(){this.$emit("page-changed",this.currentPage+1)},goto(e){this.currentPage!==e&&this.$emit("page-changed",e)},hasActive(e){return e===this.currentPage}}};var r=function(){var a=this,t=a._self._c;return t("ul",{staticClass:"pagination"},[t("li",{staticClass:"page-item",class:{disabled:a.hasFirst}},[t("button",{staticClass:"page-link",attrs:{disabled:a.hasFirst},on:{click:a.prev}},[t("i",{staticClass:"las la-angle-left"})])]),t("li",{directives:[{name:"show",rawName:"v-show",value:a.rangeFirstPage!==1,expression:"rangeFirstPage !== 1"}],staticClass:"page-item"},[t("button",{staticClass:"page-link",on:{click:function(s){return a.goto(1)}}},[a._v("1")])]),t("li",{directives:[{name:"show",rawName:"v-show",value:a.rangeFirstPage===3,expression:"rangeFirstPage === 3"}],staticClass:"page-item"},[t("button",{staticClass:"page-link",on:{click:function(s){return a.goto(2)}}},[a._v("2")])]),t("li",{directives:[{name:"show",rawName:"v-show",value:a.rangeFirstPage!==1&&a.rangeFirstPage!==2&&a.rangeFirstPage!==3,expression:`
            rangeFirstPage !== 1 &&
            rangeFirstPage !== 2 &&
            rangeFirstPage !== 3
        `}],staticClass:"page-item disabled"},[t("span",{staticClass:"page-link"},[a._v("...")])]),a._l(a.range,function(s){return t("li",{key:s,staticClass:"page-item",class:{active:a.hasActive(s)}},[t("button",{staticClass:"page-link",on:{click:function(o){return a.goto(s)}}},[a._v(" "+a._s(s)+" ")])])}),t("li",{directives:[{name:"show",rawName:"v-show",value:a.rangeLastPage!==a.totalPage&&a.rangeLastPage!==a.totalPage-1&&a.rangeLastPage!==a.totalPage-2,expression:`
            rangeLastPage !== totalPage &&
            rangeLastPage !== totalPage - 1 &&
            rangeLastPage !== totalPage - 2
        `}],staticClass:"page-item disabled"},[t("span",{staticClass:"page-link"},[a._v("...")])]),t("li",{directives:[{name:"show",rawName:"v-show",value:a.rangeLastPage===a.totalPage-2,expression:"rangeLastPage === totalPage - 2"}],staticClass:"page-item"},[t("button",{staticClass:"page-link",on:{click:function(s){return a.goto(a.totalPage-1)}}},[a._v(" "+a._s(a.totalPage-1)+" ")])]),a.rangeLastPage!==a.totalPage?t("li",{staticClass:"page-item"},[t("button",{staticClass:"page-link",on:{click:function(s){return a.goto(a.totalPage)}}},[a._v(" "+a._s(a.totalPage)+" ")])]):a._e(),t("li",{staticClass:"page-item",class:{disabled:a.hasLast}},[t("button",{staticClass:"page-link",class:{disabled:a.hasLast},on:{click:a.next}},[t("i",{staticClass:"las la-angle-right"})])])],2)},g=[],l=i(n,r,g);const P=l.exports;export{P as default};
