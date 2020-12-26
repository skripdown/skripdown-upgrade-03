//@ NAME   : _ui_factory LIB
//@ HANDLE : document object UI.
//@ AUTHOR : Malko.

window._data = {
    student : {
        data : undefined,
        fun_save : undefined,
        init : function (fun_save) {
            this.fun_save = fun_save;
        },

        insert : function (input) {
            data[input.id] = input;
        },
        get : function (key) {
            return this.data[key];
        },
        save : function (id) {
            return this.fun_save(this.data[id]);
        }
    },
    lecturer : {
        data : undefined,
        fun_save : undefined,
        init : function (fun_save) {
            this.fun_save = fun_save;
        },
        insert : function (input) {
            data[input.id] = input;
        },
        get : function (key) {
            return this.data[key];
        },
        save : function (id) {
            return this.fun_save(this.data[id]);
        }
    },
    department : {
        data : undefined,
        fun_save : undefined,
        init : function (fun_save) {
            this.fun_save = fun_save;
        },
        insert : function (input) {
            data[input.id] = input;
        },
        get : function (key) {
            return this.data[key];
        },
        save : function (id) {
            return this.fun_save(this.data[id]);
        }
    },
    faculty : {
        data : undefined,
        fun_save : undefined,
        init : function (fun_save) {
            this.fun_save = fun_save;
        },
        insert : function (input) {
            data[input.id] = input;
        },
        get : function (key) {
            return this.data[key];
        },
        save : function (id) {
            return this.fun_save(this.data[id]);
        }
    },
    super : {
        data : undefined,
        fun_save : undefined,
        init : function (fun_save) {
            this.fun_save = fun_save;
        },
        insert : function (input) {
            data[input.id] = input;
        },
        get : function (key) {
            return this.data[key];
        },
        save : function (id) {
            return this.fun_save(this.data[id]);
        }
    },
}