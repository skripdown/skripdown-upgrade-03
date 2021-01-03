window._dev = {
    order : {
        data : {},
        fun_save : undefined,
        init : function (fun_save) {
            this.fun_save = fun_save;
        },
        insert : function (input) {
            this.data[input.id] = input;
        },
        get : function (key) {
            return this.data[key];
        },
        save : function (id) {
            return this.fun_save(this.data[id]);
        }
    }
};
