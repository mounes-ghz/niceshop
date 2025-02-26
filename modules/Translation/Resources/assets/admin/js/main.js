import DataTable from "datatables.net-bs";
import TranslationEditor from "./TranslationEditor";

new DataTable(".translations-table", {
    language: {
        url: `${NiceShop.baseUrl}/build/assets/lang/datatable_fa.json`,
    },
    stateSave: true,
    pageLength: 20,
    lengthMenu: [10, 20, 50, 100, 200],
    drawCallback: () => {
        new TranslationEditor();
    },
    layout: {
        topEnd: {
            search: {
                placeholder: trans("admin::admin.table.search_here"),
            },
        },
    },
});
