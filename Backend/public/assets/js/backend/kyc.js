define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'kyc/index' + location.search,
                  
                    edit_url: 'kyc/edit',
              
                    multi_url: 'kyc/multi',
                    import_url: 'kyc/import',
                    table: 'kyc',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                columns: [
                    [
                        {checkbox: true},
                        {field: 'uid', title: 'Uid'},
                        {field: 'id', title: __('Id')},
                        {field: 'name', title: __('姓名'),operate: 'LIKE'},
                        {field: 'surname', title: __('姓氏'), operate: 'LIKE'},
                        {field: 'country', title: __('国家'), operate: 'LIKE'},
                        {field: 'card_type', title: __('证件类型'), operate: 'LIKE'},
                        {field: 'card_number', title: __('证件号'), operate: 'LIKE'},
                        {field: 'image1', title: __('证件照1'), operate: false, events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'image2', title: __('证件照2'), operate: false, events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'status', title: __('Status'), searchList: {"0":__('待审核'),"1":__('审核成功')}, formatter: Table.api.formatter.status},
                        {field: 'createtime', title: __('Createtime'), operate:'RANGE', addclass:'datetimerange', autocomplete:false, formatter: Table.api.formatter.datetime},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});
