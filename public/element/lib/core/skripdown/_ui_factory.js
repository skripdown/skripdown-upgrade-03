//@ NAME   : _ui_factory LIB
//@ HANDLE : document object UI.
//@ AUTHOR : Malko.

//@ LIBRARY : _ui_factory
//@ HANDLE  : support as custom library component factory
window._ui_factory = {
    __general : {
        ui_empty_text : function (text) {
            if (text === undefined)
                text = 'tidak ada';
            const el = document.createElement('span');
            el.setAttribute('class','text-muted');
            el.innerHTML = text;
            return [el];
        }
    },
    __pic : {
        palette : ['#0275d8','#5cb85c','#f0ad4e','#d9534f','#0b5a79','#98a48a','#7681de','#f8b93c','#a3cb05','#279546','#a63642','#d61a43','#cc6654','#db7b47','#766063'],
        pic_palette : function () {
            const palette = ['#0275d8','#5cb85c','#f0ad4e','#d9534f','#0b5a79','#98a48a','#7681de','#f8b93c','#a3cb05','#279546','#a63642','#d61a43','#cc6654','#db7b47','#766063'];
            return palette[Math.floor(Math.random() * this.palette.length)];
        }
    },
    _popover : {
        ui_container : function (opt_class) {
            if (opt_class !== undefined)
                opt_class = ' '+opt_class;
            else
                opt_class = '';
            const ctr = document.createElement('div');
            ctr.setAttribute('class','popover-icon'+opt_class);
            return [ctr];
        },
        ui_item : function (defined) {
            const ctr = document.createElement('a');
            ctr.setAttribute('class','"btn rounded-circle btn-circle font-12 popover-item text-white text-uppercase');
            if (defined) {
                const img = document.createElement('img');
                img.setAttribute('type','button');
                img.setAttribute('alt','profile_pic');
                img.setAttribute('class','rounded-circle');
                img.setAttribute('style','width:100%');
                ctr.appendChild(img);
                return [ctr, img];
            }
            ctr.setAttribute('style','background-color:'+_ui_factory.__pic.pic_palette());
            return [ctr];
        },
        ui_btn_more : function (target) {
            const btn = document.createElement('a');
            btn.setAttribute('class','btn btn-success text-white rounded-circle btn-circle font-20');
            btn.setAttribute('type','button');
            btn.setAttribute('data-toggle','modal');
            btn.setAttribute('data-target','#'+target);
            btn.innerHTML = '<i class="ti-more-alt"></i>';
            return [btn];
        },
        ui_modal_more : function (id) {
            const mdl = document.getElementById(id);
            const mdl_in = document.createElement('div');
            const mdl_in_c1 = document.createElement('div');
            const mdl_in_c1_c1 = document.createElement('div');
            const mdl_in_c1_c1_head = document.createElement('h4');
            const mdl_in_c1_c1_btn = document.createElement('button');
            const mdl_in_c1_body = document.createElement('div');
            mdl.setAttribute('class', 'modal fade');
            mdl.setAttribute('tabindex', '-1');
            mdl.setAttribute('role', 'dialog');
            mdl.setAttribute('aria-hidden', 'true');
            mdl_in.setAttribute('class','modal dialog modal-dialog-centered modal-sm modal-dialog-scrollable');
            mdl_in_c1.setAttribute('class','modal-content');
            mdl_in_c1.setAttribute('style','border-radius: 0.25rem');
            mdl_in_c1_c1.setAttribute('class','modal-header bg-success');
            mdl_in_c1_c1_head.setAttribute('class','modal-title text-white');
            mdl_in_c1_c1_head.setAttribute('id','info-user-bg');
            mdl_in_c1_c1_btn.setAttribute('type','button');
            mdl_in_c1_c1_btn.setAttribute('class','close');
            mdl_in_c1_c1_btn.setAttribute('data-dismiss','modal');
            mdl_in_c1_c1_btn.setAttribute('aria-hidden','ture');
            mdl_in_c1_c1_btn.innerHTML = '×';
            mdl_in_c1_body.setAttribute('class','modal-body');
            mdl.appendChild(mdl_in);
            mdl_in.appendChild(mdl_in_c1);
            mdl_in_c1.appendChild(mdl_in_c1_c1);
            mdl_in_c1_c1.appendChild(mdl_in_c1_c1_head);
            mdl_in_c1_c1.appendChild(mdl_in_c1_c1_btn);
            mdl_in_c1.appendChild(mdl_in_c1_body);

            return [mdl, mdl_in_c1_c1_head, mdl_in_c1_body];
        },
        ui_head_more : function () {
            return [document.createElement('span')];
        },
        ui_item_more : function (defined) {
            const row = document.createElement('div');
            const col = document.createElement('div');
            const ml3 = document.createElement('div');
            const btn = document.createElement('a');
            const pic = document.createElement('img');
            const ctr = document.createElement('div');
            const cnt = document.createElement('div');
            const nme = document.createElement('a');
            row.setAttribute('class', 'row border-bottom pb-1 pt-1');
            col.setAttribute('class', 'col-2');
            ml3.setAttribute('class', 'ml-3');
            btn.setAttribute('type','button');
            btn.setAttribute('class','btn rounded-circle btn-circle font-12 popover-item');
            pic.setAttribute('class', 'rounded-circle');
            pic.setAttribute('alt', 'profile_pic');
            ctr.setAttribute('class','col-10 container d-flex');
            cnt.setAttribute('class','row justify-content-center align-self-center ml-2');
            nme.setAttribute('type','button');
            nme.setAttribute('class','font-weight-semibold text-dark');
            row.appendChild(col);
            row.appendChild(ctr);
            col.appendChild(ml3);
            ml3.appendChild(btn);
            ctr.appendChild(cnt);
            cnt.appendChild(nme);
            if (defined) {
                btn.appendChild(pic);
                return [row,btn,nme,pic];
            }
            else
                btn.setAttribute('style','background-color:'+_ui_factory.__pic.pic_palette());
            return [row,btn,nme];
        },
    },
    _taglist : {
        ui_container : function (el) {
            if (el === undefined)
                el = 'div';
            return [document.createElement(el)];
        },
        ui_items : function (keys, opt_class) {
            if (opt_class !== undefined)
                opt_class = ' '+opt_class;
            else
                opt_class = '';
            let elements  = [];
            for (let i = 0; i < keys.length; i++) {
                const temp_el = document.createElement('div');
                temp_el.setAttribute('class', 'bg-success d-inline-block p-1 text-white rounded m-1'+opt_class);
                temp_el.innerHTML  = keys[i];
                elements.push(temp_el);
            }
            return elements;
        },

    },
    _card : {
        card : function (id) {
            const ctr = document.getElementById(id);
            const ctr_c1 = document.createElement('div');
            const ctr_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c1_c1 = document.createElement('h3');
            const ctr_c1_c1_c1_c1_titleCtr = document.createElement('span');
            const ctr_c1_c1_c1_c1_minBtn = document.createElement('button');
            const ctr_c1_c1_c1_c1_minBtn_icon = document.createElement('i');
            const ctr_c1_c1_c1_c1_switchCtr = document.createElement('span');
            const ctr_c1_c1_c1_c2 = document.createElement('div');
            const ctr_c1_c1_c1_c2_cardCtr = document.createElement('div');

            ctr.setAttribute('class','row');
            ctr_c1.setAttribute('class','col-lg-12');
            ctr_c1_c1.setAttribute('class','card');
            ctr_c1_c1_c1.setAttribute('class','card-body');
            ctr_c1_c1_c1_c1.setAttribute('class','card-title');
            ctr_c1_c1_c1_c1_minBtn.setAttribute('class','btn btn-light btn-sm ml-4');
            ctr_c1_c1_c1_c1_minBtn.setAttribute('type','button');
            ctr_c1_c1_c1_c1_minBtn_icon.setAttribute('class','ti-arrow-up');
            ctr_c1_c1_c1_c1_switchCtr.setAttribute('class','float-right');
            ctr_c1_c1_c1_c2.setAttribute('class','p-0 m-0');

            ctr.appendChild(ctr_c1);
            ctr_c1.appendChild(ctr_c1_c1);
            ctr_c1_c1.appendChild(ctr_c1_c1_c1);
            ctr_c1_c1_c1.appendChild(ctr_c1_c1_c1_c1);
            ctr_c1_c1_c1.appendChild(ctr_c1_c1_c1_c2);
            ctr_c1_c1_c1_c1.appendChild(ctr_c1_c1_c1_c1_titleCtr);
            ctr_c1_c1_c1_c1.appendChild(ctr_c1_c1_c1_c1_minBtn);
            ctr_c1_c1_c1_c1.appendChild(ctr_c1_c1_c1_c1_switchCtr);
            ctr_c1_c1_c1_c1_minBtn.appendChild(ctr_c1_c1_c1_c1_minBtn_icon);
            ctr_c1_c1_c1_c2.appendChild(ctr_c1_c1_c1_c2_cardCtr);

            ctr_c1_c1_c1_c1_minBtn.addEventListener('click',function () {
                const status = ctr_c1_c1_c1_c1_minBtn_icon.getAttribute('class');
                if (status === 'ti-arrow-up') {
                    ctr_c1_c1_c1_c1_minBtn_icon.setAttribute('class','ti-arrow-down');
                    ctr_c1_c1_c1_c2.setAttribute('class', ctr_c1_c1_c1_c2.getAttribute('class')+' d-none');
                }
                else {
                    ctr_c1_c1_c1_c1_minBtn_icon.setAttribute('class','ti-arrow-up');
                    ctr_c1_c1_c1_c2.setAttribute('class', ctr_c1_c1_c1_c2.getAttribute('class').replace(' d-none',''));

                }
            });

            return [ctr, ctr_c1_c1_c1_c1_titleCtr, ctr_c1_c1_c1_c2_cardCtr, ctr_c1_c1_c1_c1_switchCtr];
        },
        ui_switch_btn : function (label, active) {
            if (active === undefined)
                active = false;
            const btn = document.createElement('button');
            const icn = document.createElement('i');

            btn.setAttribute('type','button');
            if (active)
                btn.setAttribute('class', 'btn btn-success rounded btn-sm ml-2');
            else
                btn.setAttribute('class','btn btn-outline-success rounded btn-sm ml-2');
            btn.appendChild(icn);
            icn.setAttribute('class',label);

            return [btn];
        },
        ui_title : function (titleHTML) {
            const ctr = document.createElement('span');
            ctr.innerHTML = titleHTML;
            return [ctr];
        },
        ui_content : function (contentHTML) {
            const ctr = document.createElement('div');
            if (typeof contentHTML === 'object')
                ctr.appendChild(contentHTML);
            else
                ctr.innerHTML = contentHTML;
            return [ctr];
        },
        event : {
            click_switch : function (btn, switchBtns, titles, contents) {
                btn.addEventListener('click',function () {
                    for (let i = 0; i < switchBtns.length; i++) {
                        if (switchBtns[i] === btn) {
                            switchBtns[i].setAttribute('class','btn btn-success rounded btn-sm ml-2');
                            titles[i].setAttribute('class','');
                            contents[i].setAttribute('class','');
                        }
                        else {
                            switchBtns[i].setAttribute('class','btn btn-outline-success rounded btn-sm ml-2');
                            titles[i].setAttribute('class','d-none');
                            contents[i].setAttribute('class','d-none');
                        }
                    }
                });
                if (switchBtns.length > 1) {
                    for (let i = 1; i < switchBtns.length; i++) {
                        titles[i].setAttribute('class','d-none');
                        contents[i].setAttribute('class','d-none');
                    }
                }
            }
        },
    },
    _user_info : {
        ui_modal : function (id) {
            const mdl = document.getElementById(id);
            const mdl_c1 = document.createElement('div');
            const mdl_c1_c1 = document.createElement('div');
            const mdl_c1_c1_c1 = document.createElement('div');
            const mdl_c1_c1_c1_head = document.createElement('h4');
            const mdl_c1_c1_c1_btn = document.createElement('button');
            const mdl_c1_c1_bg = document.createElement('div');
            const mdl_c1_c1_ctr = document.createElement('div');

            mdl.setAttribute('class','modal fade');
            mdl.setAttribute('tabindex','-1');
            mdl.setAttribute('role','dialog');
            mdl.setAttribute('aria-hidden','true');
            mdl_c1.setAttribute('class','modal-dialog modal-dialog-centered');
            mdl_c1_c1.setAttribute('class','modal-content');
            mdl_c1_c1.setAttribute('style','border-radius: 0.25rem');
            mdl_c1_c1_c1.setAttribute('class','modal-header bg-success');
            mdl_c1_c1_c1_head.setAttribute('class','modal-title text-white');
            mdl_c1_c1_c1_btn.setAttribute('type','button');
            mdl_c1_c1_c1_btn.setAttribute('class','close');
            mdl_c1_c1_c1_btn.setAttribute('data-dismiss','modal');
            mdl_c1_c1_c1_btn.setAttribute('aria-hidden','true');
            mdl_c1_c1_c1_btn.innerHTML = '×';
            mdl_c1_c1_bg.setAttribute('id','info-user-bg');
            mdl_c1_c1_ctr.setAttribute('class','modal-body');
            mdl.appendChild(mdl_c1);
            mdl_c1.appendChild(mdl_c1_c1);
            mdl_c1_c1.appendChild(mdl_c1_c1_c1);
            mdl_c1_c1.appendChild(mdl_c1_c1_bg);
            mdl_c1_c1.appendChild(mdl_c1_c1_ctr);
            mdl_c1_c1_c1.appendChild(mdl_c1_c1_c1_head);
            mdl_c1_c1_c1.appendChild(mdl_c1_c1_c1_btn);

            return [mdl,mdl_c1_c1_c1_head,mdl_c1_c1_ctr];
        },
        ui_all : function (pic) {
            if (pic === undefined)
                pic = false;
            const ctr1 = document.createElement('div');
            const ctr1_c1 = document.createElement('div');
            const ctr1_c1_c1 = document.createElement('div');
            const ctr1_c1_c1_pic = document.createElement('a');
            const ctr1_c1_c1_img = document.createElement('img');
            const ctr2 = document.createElement('div');
            const ctr2_name = document.createElement('div');
            const ctr2_id = document.createElement('div');
            const ext = document.createElement('div');

            ctr1.setAttribute('class','row');
            ctr1_c1.setAttribute('class','col-lg-6 ml-auto mr-auto');
            ctr1_c1.setAttribute('style','margin: 4.25rem auto');
            ctr1_c1_c1.setAttribute('class','text-center');
            ctr2.setAttribute('class','row');
            ctr2_name.setAttribute('class','col-lg-12 text-center h3 text-dark');
            ctr2_id.setAttribute('class','col-lg-12 text-center h4 text-black-50');
            ext.setAttribute('class','row');
            ext.setAttribute('style','max-width: 60%; margin: 0 auto;');

            ctr1.appendChild(ctr1_c1);
            ctr1_c1.appendChild(ctr1_c1_c1);
            ctr2.appendChild(ctr2_name);
            ctr2.appendChild(ctr2_id);
            if (pic) {
                ctr1_c1_c1.appendChild(ctr1_c1_c1_img);
                ctr1_c1_c1_img.setAttribute('class','rounded-circle');
                ctr1_c1_c1_img.setAttribute('alt','profile_pic');
                ctr1_c1_c1_img.setAttribute('style','width: 12rem;display: block; margin: -4rem auto -2rem');
                return [ctr1,ctr2,ext,ctr1_c1_c1_img,ctr2_name,ctr2_id];
            }
            ctr1_c1_c1.appendChild(ctr1_c1_c1_pic);
            ctr1_c1_c1_pic.setAttribute('class','rounded-circle text-white text-center text-uppercase');
            ctr1_c1_c1_pic.setAttribute('style','padding: 4rem; font-size: 28pt;background-color:'+_ui_factory.__pic.pic_palette());

            return [ctr1,ctr2,ext,ctr1_c1_c1_pic,ctr2_name,ctr2_id];
        },
        ui_ext_student : function () {
            const ctr = document.createElement('div');
            const ctr_c1 = document.createElement('div');
            const ctr_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c2 = document.createElement('div');
            const ctr_c1_c1_c2_c1 = document.createElement('div');
            const ctr_c1_c1_c3 = document.createElement('div');
            const ctr_c1_c1_c3_c1 = document.createElement('div');
            const ctr_c1_c1_c4 = document.createElement('div');
            const ctr_c1_c1_c4_c1 = document.createElement('div');

            ctr.setAttribute('class','col-auto ml-auto mr-auto mb-4');
            ctr_c1.setAttribute('style','display: inline-block; margin: 0 auto;');
            ctr_c1_c1.setAttribute('class','');
            ctr_c1_c1_c1.setAttribute('class','row');
            ctr_c1_c1_c1_c1.setAttribute('class','col-12 font-12 mr-auto ml-auto pt-2');
            ctr_c1_c1_c1_c1.innerHTML = 'jurusan / fakultas';
            ctr_c1_c1_c2.setAttribute('class','row');
            ctr_c1_c1_c2_c1.setAttribute('class','col-12 font-16 text-dark mr-auto ml-auto pb-2');
            ctr_c1_c1_c3.setAttribute('class','row');
            ctr_c1_c1_c3_c1.setAttribute('class','col-12 font-12 mr-auto ml-auto pt-1');
            ctr_c1_c1_c3_c1.innerHTML = 'judul tugas akhir / progres';
            ctr_c1_c1_c4.setAttribute('class','row');
            ctr_c1_c1_c4_c1.setAttribute('class','col-12 font-16 text-dark mr-auto ml-auto pb-2');

            ctr.appendChild(ctr_c1);
            ctr_c1.appendChild(ctr_c1_c1);
            ctr_c1_c1.appendChild(ctr_c1_c1_c1);
            ctr_c1_c1.appendChild(ctr_c1_c1_c2);
            ctr_c1_c1.appendChild(ctr_c1_c1_c3);
            ctr_c1_c1.appendChild(ctr_c1_c1_c4);
            ctr_c1_c1_c1.appendChild(ctr_c1_c1_c1_c1);
            ctr_c1_c1_c2.appendChild(ctr_c1_c1_c2_c1);
            ctr_c1_c1_c3.appendChild(ctr_c1_c1_c3_c1);
            ctr_c1_c1_c4.appendChild(ctr_c1_c1_c4_c1);
            return [ctr, ctr_c1_c1_c2_c1, ctr_c1_c1_c4_c1];
        },
        ui_ext_lecturer : function () {
            const ctr = document.createElement('div');
            const ctr_c1 = document.createElement('div');
            const ctr_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c2 = document.createElement('div');
            const ctr_c1_c1_c2_c1 = document.createElement('div');
            const ctr_c1_c1_c3 = document.createElement('div');
            const ctr_c1_c1_c3_c1 = document.createElement('div');
            const ctr_c1_c1_c4 = document.createElement('div');
            const ctr_c1_c1_c4_c1 = document.createElement('div');
            const ctr_c1_c1_c5 = document.createElement('div');
            const ctr_c1_c1_c5_c1 = document.createElement('div');
            const ctr_c1_c1_c6 = document.createElement('div');
            const ctr_c1_c1_c6_c1 = document.createElement('div');

            ctr.setAttribute('class','col-auto ml-auto mr-auto mb-4');
            ctr_c1.setAttribute('style','display: inline-block; margin: 0 auto;');
            ctr_c1_c1.setAttribute('class','');
            ctr_c1_c1_c1.setAttribute('class','row');
            ctr_c1_c1_c1_c1.setAttribute('class','col-12 font-12 mr-auto ml-auto pt-2');
            ctr_c1_c1_c1_c1.innerHTML = 'aktif bimbingan';
            ctr_c1_c1_c2.setAttribute('class','row');
            ctr_c1_c1_c2_c1.setAttribute('class','col-12 font-16 text-dark mr-auto ml-auto pb-2');
            ctr_c1_c1_c3.setAttribute('class','row');
            ctr_c1_c1_c3_c1.setAttribute('class','col-12 font-12 mr-auto ml-auto pt-1');
            ctr_c1_c1_c3_c1.innerHTML = 'jumlah dokumen';
            ctr_c1_c1_c4.setAttribute('class','row');
            ctr_c1_c1_c4_c1.setAttribute('class','col-12 font-16 text-dark mr-auto ml-auto pb-2');
            ctr_c1_c1_c5.setAttribute('class','row');
            ctr_c1_c1_c5_c1.setAttribute('class','col-12 font-12 mr-auto ml-auto pt-1');
            ctr_c1_c1_c5_c1.innerHTML = 'kata kunci sering diambil';
            ctr_c1_c1_c6.setAttribute('class','row');
            ctr_c1_c1_c6_c1.setAttribute('class','col-12 font-16 text-dark mr-auto ml-auto pb-2');

            ctr.appendChild(ctr_c1);
            ctr_c1.appendChild(ctr_c1_c1);
            ctr_c1_c1.appendChild(ctr_c1_c1_c1);
            ctr_c1_c1.appendChild(ctr_c1_c1_c2);
            ctr_c1_c1.appendChild(ctr_c1_c1_c3);
            ctr_c1_c1.appendChild(ctr_c1_c1_c4);
            ctr_c1_c1.appendChild(ctr_c1_c1_c5);
            ctr_c1_c1.appendChild(ctr_c1_c1_c6);
            ctr_c1_c1_c1.appendChild(ctr_c1_c1_c1_c1);
            ctr_c1_c1_c2.appendChild(ctr_c1_c1_c2_c1);
            ctr_c1_c1_c3.appendChild(ctr_c1_c1_c3_c1);
            ctr_c1_c1_c4.appendChild(ctr_c1_c1_c4_c1);
            ctr_c1_c1_c5.appendChild(ctr_c1_c1_c5_c1);
            ctr_c1_c1_c6.appendChild(ctr_c1_c1_c6_c1);
            return [ctr, ctr_c1_c1_c2_c1, ctr_c1_c1_c4_c1, ctr_c1_c1_c6_c1];
        },
        ui_ext_department : function () {
            const ctr = document.createElement('div');
            const ctr_c1 = document.createElement('div');
            const ctr_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c2 = document.createElement('div');
            const ctr_c1_c1_c2_c1 = document.createElement('div');
            const ctr_c1_c1_c3 = document.createElement('div');
            const ctr_c1_c1_c3_c1 = document.createElement('div');
            const ctr_c1_c1_c4 = document.createElement('div');
            const ctr_c1_c1_c4_c1 = document.createElement('div');
            const ctr_c1_c1_c5 = document.createElement('div');
            const ctr_c1_c1_c5_c1 = document.createElement('div');
            const ctr_c1_c1_c6 = document.createElement('div');
            const ctr_c1_c1_c6_c1 = document.createElement('div');

            ctr.setAttribute('class','col-auto ml-auto mr-auto mb-4');
            ctr_c1.setAttribute('style','display: inline-block; margin: 0 auto;');
            ctr_c1_c1.setAttribute('class','');
            ctr_c1_c1_c1.setAttribute('class','row');
            ctr_c1_c1_c1_c1.setAttribute('class','col-12 font-12 mr-auto ml-auto pt-2');
            ctr_c1_c1_c1_c1.innerHTML = 'fakultas';
            ctr_c1_c1_c2.setAttribute('class','row');
            ctr_c1_c1_c2_c1.setAttribute('class','col-12 font-16 text-dark mr-auto ml-auto pb-2');
            ctr_c1_c1_c3.setAttribute('class','row');
            ctr_c1_c1_c3_c1.setAttribute('class','col-12 font-12 mr-auto ml-auto pt-1');
            ctr_c1_c1_c3_c1.innerHTML = 'dosen';
            ctr_c1_c1_c4.setAttribute('class','row');
            ctr_c1_c1_c4_c1.setAttribute('class','col-12 font-16 text-dark mr-auto ml-auto pb-2');
            ctr_c1_c1_c5.setAttribute('class','row');
            ctr_c1_c1_c5_c1.setAttribute('class','col-12 font-12 mr-auto ml-auto pt-1');
            ctr_c1_c1_c5_c1.innerHTML = 'jumlah dokumen';
            ctr_c1_c1_c6.setAttribute('class','row');
            ctr_c1_c1_c6_c1.setAttribute('class','col-12 font-16 text-dark mr-auto ml-auto pb-2');

            ctr.appendChild(ctr_c1);
            ctr_c1.appendChild(ctr_c1_c1);
            ctr_c1_c1.appendChild(ctr_c1_c1_c1);
            ctr_c1_c1.appendChild(ctr_c1_c1_c2);
            ctr_c1_c1.appendChild(ctr_c1_c1_c3);
            ctr_c1_c1.appendChild(ctr_c1_c1_c4);
            ctr_c1_c1.appendChild(ctr_c1_c1_c5);
            ctr_c1_c1.appendChild(ctr_c1_c1_c6);
            ctr_c1_c1_c1.appendChild(ctr_c1_c1_c1_c1);
            ctr_c1_c1_c2.appendChild(ctr_c1_c1_c2_c1);
            ctr_c1_c1_c3.appendChild(ctr_c1_c1_c3_c1);
            ctr_c1_c1_c4.appendChild(ctr_c1_c1_c4_c1);
            ctr_c1_c1_c5.appendChild(ctr_c1_c1_c5_c1);
            ctr_c1_c1_c6.appendChild(ctr_c1_c1_c6_c1);
            return [ctr, ctr_c1_c1_c2_c1, ctr_c1_c1_c4_c1, ctr_c1_c1_c6_c1];
        },
        ui_ext_faculty : function () {
            const ctr = document.createElement('div');
            const ctr_c1 = document.createElement('div');
            const ctr_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c2 = document.createElement('div');
            const ctr_c1_c1_c2_c1 = document.createElement('div');
            const ctr_c1_c1_c3 = document.createElement('div');
            const ctr_c1_c1_c3_c1 = document.createElement('div');
            const ctr_c1_c1_c4 = document.createElement('div');
            const ctr_c1_c1_c4_c1 = document.createElement('div');

            ctr.setAttribute('class','col-auto ml-auto mr-auto mb-4');
            ctr_c1.setAttribute('style','display: inline-block; margin: 0 auto;');
            ctr_c1_c1.setAttribute('class','');
            ctr_c1_c1_c1.setAttribute('class','row');
            ctr_c1_c1_c1_c1.setAttribute('class','col-12 font-12 mr-auto ml-auto pt-2');
            ctr_c1_c1_c1_c1.innerHTML = 'jurusan';
            ctr_c1_c1_c2.setAttribute('class','row');
            ctr_c1_c1_c2_c1.setAttribute('class','col-12 font-16 text-dark mr-auto ml-auto pb-2');
            ctr_c1_c1_c3.setAttribute('class','row');
            ctr_c1_c1_c3_c1.setAttribute('class','col-12 font-12 mr-auto ml-auto pt-1');
            ctr_c1_c1_c3_c1.innerHTML = 'jumlah dokumen';
            ctr_c1_c1_c4.setAttribute('class','row');
            ctr_c1_c1_c4_c1.setAttribute('class','col-12 font-16 text-dark mr-auto ml-auto pb-2');

            ctr.appendChild(ctr_c1);
            ctr_c1.appendChild(ctr_c1_c1);
            ctr_c1_c1.appendChild(ctr_c1_c1_c1);
            ctr_c1_c1.appendChild(ctr_c1_c1_c2);
            ctr_c1_c1.appendChild(ctr_c1_c1_c3);
            ctr_c1_c1.appendChild(ctr_c1_c1_c4);
            ctr_c1_c1_c1.appendChild(ctr_c1_c1_c1_c1);
            ctr_c1_c1_c2.appendChild(ctr_c1_c1_c2_c1);
            ctr_c1_c1_c3.appendChild(ctr_c1_c1_c3_c1);
            ctr_c1_c1_c4.appendChild(ctr_c1_c1_c4_c1);
            return [ctr, ctr_c1_c1_c2_c1, ctr_c1_c1_c4_c1];
        },
        ui_ext_super : function () {
            const ctr = document.createElement('div');
            const ctr_c1 = document.createElement('div');
            const ctr_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c2 = document.createElement('div');
            const ctr_c1_c1_c2_c1 = document.createElement('div');
            const ctr_c1_c1_c3 = document.createElement('div');
            const ctr_c1_c1_c3_c1 = document.createElement('div');
            const ctr_c1_c1_c4 = document.createElement('div');
            const ctr_c1_c1_c4_c1 = document.createElement('div');

            ctr.setAttribute('class','col-auto ml-auto mr-auto mb-4');
            ctr_c1.setAttribute('style','display: inline-block; margin: 0 auto;');
            ctr_c1_c1.setAttribute('class','');
            ctr_c1_c1_c1.setAttribute('class','row');
            ctr_c1_c1_c1_c1.setAttribute('class','col-12 font-12 mr-auto ml-auto pt-2');
            ctr_c1_c1_c1_c1.innerHTML = 'fakultas';
            ctr_c1_c1_c2.setAttribute('class','row');
            ctr_c1_c1_c2_c1.setAttribute('class','col-12 font-16 text-dark mr-auto ml-auto pb-2');
            ctr_c1_c1_c3.setAttribute('class','row');
            ctr_c1_c1_c3_c1.setAttribute('class','col-12 font-12 mr-auto ml-auto pt-1');
            ctr_c1_c1_c3_c1.innerHTML = 'jumlah dokumen';
            ctr_c1_c1_c4.setAttribute('class','row');
            ctr_c1_c1_c4_c1.setAttribute('class','col-12 font-16 text-dark mr-auto ml-auto pb-2');

            ctr.appendChild(ctr_c1);
            ctr_c1.appendChild(ctr_c1_c1);
            ctr_c1_c1.appendChild(ctr_c1_c1_c1);
            ctr_c1_c1.appendChild(ctr_c1_c1_c2);
            ctr_c1_c1.appendChild(ctr_c1_c1_c3);
            ctr_c1_c1.appendChild(ctr_c1_c1_c4);
            ctr_c1_c1_c1.appendChild(ctr_c1_c1_c1_c1);
            ctr_c1_c1_c2.appendChild(ctr_c1_c1_c2_c1);
            ctr_c1_c1_c3.appendChild(ctr_c1_c1_c3_c1);
            ctr_c1_c1_c4.appendChild(ctr_c1_c1_c4_c1);
            return [ctr, ctr_c1_c1_c2_c1, ctr_c1_c1_c4_c1];
        }
    },
    _tables : {
        ui_container : function (element) {
            const ctr         = document.createElement('div');
            const ctr_tbl     = document.createElement('table');
            const ctr_tbl_thd = document.createElement('thead');
            const ctr_tbl_tbd = document.createElement('tbody');

            ctr.setAttribute('id',element);
            ctr.setAttribute('class','table-responsive');

            ctr.appendChild(ctr_tbl);
            ctr_tbl.appendChild(ctr_tbl_thd);
            ctr_tbl.appendChild(ctr_tbl_tbd);

            return [ctr, ctr_tbl, ctr_tbl_thd, ctr_tbl_tbd];
        },
        insert_row : function (column, classes='') {
            const row     = document.createElement('tr');
            for (let i = 0; i < column.length; i++) {
                const col = document.createElement('td');
                if (column[i].class !== undefined)
                    col.setAttribute('class',column[i].class+classes);
                else
                    col.setAttribute('class',classes);
                if (column[i].style !== undefined)
                    col.setAttribute('style',column[i].style);
                if (typeof column[i].content === 'object')
                    col.appendChild(column[i].content);
                else
                    col.innerHTML = column[i].content;
                row.appendChild(col);
            }
            return [row];
        }
    },
    _navcard : {
        card : function (id) {
            const ctr = document.getElementById(id);

            ctr.setAttribute('class','card-group');

            return [ctr];
        },
        item : function () {
            const ctr = document.createElement('div');
            const ctr_c1 = document.createElement('div');
            const ctr_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c1_c1 = document.createElement('div');
            const ctr_c1_c1_c1_c1_val = document.createElement('h2');
            const ctr_c1_c1_c1_c1_stat = document.createElement('span');
            const ctr_c1_c1_c1_label = document.createElement('h6');
            const ctr_c1_c1_c2 = document.createElement('div');
            const ctr_c1_c1_c2_c1 = document.createElement('span');
            const ctr_c1_c1_c2_c1_icon = document.createElement('i');

            ctr.setAttribute('class','card border-right');
            ctr_c1.setAttribute('class','card-body');
            ctr_c1_c1.setAttribute('class','d-flex d-lg-flex d-md-block align-items-center');
            ctr_c1_c1_c1_c1.setAttribute('class','d-inline-flex align-items-center');
            ctr_c1_c1_c1_c1_val.setAttribute('class','text-dark mb-1 font-weight-medium');
            ctr_c1_c1_c1_c1_stat.setAttribute('class','badge font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none d-none');
            ctr_c1_c1_c1_label.setAttribute('class','text-muted font-weight-normal mb-0 w-100 text-truncate');
            ctr_c1_c1_c2.setAttribute('class','ml-auto mt-md-3 mt-lg-0');
            ctr_c1_c1_c2_c1.setAttribute('class','opacity-7 text-muted');

            ctr.appendChild(ctr_c1);
            ctr_c1.appendChild(ctr_c1_c1);
            ctr_c1_c1.appendChild(ctr_c1_c1_c1);
            ctr_c1_c1.appendChild(ctr_c1_c1_c2);
            ctr_c1_c1_c1.appendChild(ctr_c1_c1_c1_c1);
            ctr_c1_c1_c1_c1.appendChild(ctr_c1_c1_c1_c1_val);
            ctr_c1_c1_c1_c1.appendChild(ctr_c1_c1_c1_c1_stat);
            ctr_c1_c1_c1.appendChild(ctr_c1_c1_c1_label);
            ctr_c1_c1_c2.appendChild(ctr_c1_c1_c2_c1);
            ctr_c1_c1_c2_c1.appendChild(ctr_c1_c1_c2_c1_icon);

            return [ctr, ctr_c1_c1_c1_c1_val, ctr_c1_c1_c1_c1_stat, ctr_c1_c1_c1_label, ctr_c1_c1_c2_c1_icon];
        },
        success : function (element) {
            element.setAttribute('class',element.getAttribute('class').replace(' d-none',''));
            element.setAttribute('class',element.getAttribute('class').replace(' bg-secondary',''));
            element.setAttribute('class', element.getAttribute('class')+' bg-success');
        },
        danger : function (element) {
            element.setAttribute('class',element.getAttribute('class').replace(' d-none',''));
            element.setAttribute('class',element.getAttribute('class').replace(' bg-success',''));
            element.setAttribute('class', element.getAttribute('class')+' bg-secondary');
        },
        hide : function (element) {
            element.setAttribute('class', element.getAttribute('class')+' d-none');
        }
    },
    _linechart : {
        container : function (id) {
            const main = document.createElement('div');
            const ctr  = document.createElement('div');
            const ctr2 = document.createElement('ul');

            ctr.setAttribute('class',id);
            ctr2.setAttribute('class','list-inline text-right');

            main.appendChild(ctr);
            main.appendChild(ctr2);

            return [main, ctr, ctr2];
        },
        item : function (label, color) {
            const ctr = document.createElement('li');
            const ctr_h5 = document.createElement('h5');
            const ctr_h5_i = document.createElement('i');
            const ctr_h5_span = document.createElement('span');

            ctr.setAttribute('class','list-inline-item');
            ctr_h5_i.setAttribute('class','fa fa-circle mr-1');
            ctr_h5_i.setAttribute('style','color:'+color);
            ctr_h5_span.innerHTML = label;

            ctr.appendChild(ctr_h5);
            ctr_h5.appendChild(ctr_h5_i);
            ctr_h5.appendChild(ctr_h5_span);

            return [ctr];
        }
    },
    _popup : {
        card : function (element) {
            const ctr = element;
            const ctr_c1 = document.createElement('div');
            const ctr_c1_c1 = document.createElement('div');
            const ctr_c1_c1_hdr = document.createElement('div');
            const ctr_c1_c1_hdr_ttl = document.createElement('h4');
            const ctr_c1_c1_hdr_cls = document.createElement('button');
            const ctr_c1_c1_bdy = document.createElement('div');

            ctr.setAttribute('aria-hidden','true');
            ctr.setAttribute('tabindex','-1');
            ctr.setAttribute('class','modal fade');
            ctr.setAttribute('role','dialog');
            ctr_c1.setAttribute('class','modal-dialog modal-dialog-centered');
            ctr_c1_c1.setAttribute('class','modal-content');
            ctr_c1_c1_hdr.setAttribute('class','modal-header');
            ctr_c1_c1_hdr_ttl.setAttribute('class','modal-title');
            ctr_c1_c1_hdr_cls.setAttribute('class','close');
            ctr_c1_c1_hdr_cls.setAttribute('type','button');
            ctr_c1_c1_hdr_cls.setAttribute('data-dismiss','modal');
            ctr_c1_c1_hdr_cls.setAttribute('aria-hidden','true');
            ctr_c1_c1_hdr_cls.innerText = '×';
            ctr_c1_c1_bdy.setAttribute('class','modal-body');

            ctr.append(ctr_c1);
            ctr_c1.append(ctr_c1_c1);
            ctr_c1_c1.append(ctr_c1_c1_hdr);
            ctr_c1_c1.append(ctr_c1_c1_bdy);
            ctr_c1_c1_hdr.append(ctr_c1_c1_hdr_ttl);
            ctr_c1_c1_hdr.append(ctr_c1_c1_hdr_cls);

            return [ctr, ctr_c1_c1_hdr_ttl, ctr_c1_c1_bdy];
        }
    },
}

//@ LIBRARY : _card
//@ HANDLE  : bootstrap card UI
//@ VERSION : 2
window._card = {
    //@ FUN   : render `void`
    //@ PARAM : input `JSON`{element`str`,items[{label`str`,title`str`,content`str`}]}
    render : function (input) {
        const uif_lib     = _ui_factory._card;
        const card_item   = uif_lib.card(input.element);
        const title_ctr   = card_item[1];
        const content_ctr = card_item[2];
        const switch_ctr  = card_item[3];
        const items       = input.items;
        let contents      = [],
            titles        = [],
            switches      = [];
        let active        = true;
        const switchable  = items.length > 1;
        for (let i = 0; i < items.length; i++) {
            const temp_content = uif_lib.ui_content(items[i].content)[0];
            const temp_title   = uif_lib.ui_title(items[i].title)[0];
            const temp_switch  = uif_lib.ui_switch_btn(items[i].label, active)[0];
            contents.push(temp_content);
            titles.push(temp_title);
            content_ctr.appendChild(temp_content);
            title_ctr.appendChild(temp_title);
            if (switchable) {
                switches.push(temp_switch);
                switch_ctr.appendChild(temp_switch);
            }
            active = false;
        }
        if (switchable) {
            for (let i = 0; i < switches.length; i++) {
                uif_lib.event.click_switch(switches[i], switches, titles, contents);
            }
        }
    }
}

//@ LIBRARY : _taglist
//@ HANDLE  : bootstrap tag list UI
//@ VERSION : 2
window._taglist = {
    //@ FUN   : render `DOMelement`
    //@ PARAM : input `JSON`{element`str`,keys[`str`],opt_class`str`}
    render : function (input) {
        const uif_lib   = _ui_factory._taglist;
        const element   = uif_lib.ui_container(input.element)[0];
        const keys      = input.keys;
        const opt_class = input.opt_class;
        if (keys === undefined) {
            element.appendChild(_ui_factory.__general.ui_empty_text()[0]);
            return element;
        }
        if (keys.length === 0) {
            element.appendChild(_ui_factory.__general.ui_empty_text()[0]);
            return element;
        }
        const keys_ui   = uif_lib.ui_items(keys, opt_class);
        for (let i = 0; i < keys_ui.length; i++) {
            element.appendChild(keys_ui[i]);
        }
        return element;
    }
}

//@ LIBRARY : _popover
//@ HANDLE  : bootstrap popover list UI
//@ VERSION : 2
window._popover = {
    modal_more : {
        id : undefined,
        modal : undefined,
        head : undefined,
        body : undefined
    },
    //@ FUN   : init `DOMelement`
    //@ PARAM : id `str`
    init : function (id) {
        const uif_lib = _ui_factory._popover;
        const temp    = uif_lib.ui_modal_more(id);
        this.modal_more.id = id;
        this.modal_more.modal = temp[0];
        this.modal_more.head  = temp[1];
        this.modal_more.body  = temp[2];
    },
    //@ FUN   : render `DOMelement`
    //@ PARAM : input `JSON`{items`JSON`[{}]}
    render : function (input) {
        const uif_lib   = _ui_factory._popover;
        const container = uif_lib.ui_container(input.opt_class)[0];
        const items     = input.items;
        let more        = false;
        let max         = 0;
        if (items === undefined) {
            container.appendChild(_ui_factory.__general.ui_empty_text()[0]);
            return container;
        }
        if (items.length === 0) {
            container.appendChild(_ui_factory.__general.ui_empty_text()[0]);
            return container;
        }
        if (items.length > 6) {
            more = true;
            max  = 6;
        }
        else {
            max  = items.length;
        }
        for (let i = 0; i < max; i++) {
            const item = items[i];
            let   ui   = uif_lib.ui_item(item.has_pic);
            if (item.has_pic)
                ui[1].setAttribute('src',item.pic);
            else
                ui[0].innerHTML = item.pic;
            ui = ui[0];
            ui.setAttribute('data-toggle','modal');
            ui.setAttribute('data-target',_user_info.modal.id);
            ui.addEventListener('click',function () {_user_info.render(item)});
            container.appendChild(ui);
        }
        if (more) {
            const modal          = _popover.modal_more;
            const btn_more       = uif_lib.ui_btn_more(modal.id)[0];
            const title          = input.title;
            modal.head.innerHTML = '';
            modal.body.innerHTML = '';
            container.appendChild(btn_more);
            btn_more.addEventListener('click',function () {
                const modal_title     = uif_lib.ui_head_more()[0];
                modal_title.innerHTML = title;
                modal.head.innerHTML  = '';
                modal.body.innerHTML  = '';
                modal.head.appendChild(modal_title);
                for (let i = 0; i < items.length; i++) {
                    const item        = items[i];
                    const has_pic     = item.has_pic;
                    const temp        = uif_lib.ui_item_more(has_pic);
                    const modal_item  = temp[0];
                    const item_pic    = temp[1];
                    const item_text   = temp[2];
                    modal.body.appendChild(modal_item);
                    if (has_pic) {
                        const item_img = temp[3];
                        item_img.setAttribute('src',item.pic);
                    }
                    item_pic.setAttribute('data-toggle','modal');
                    item_pic.setAttribute('data-target',_user_info.modal.id);
                    item_pic.addEventListener('click',function () {_user_info.render(item)});
                    item_text.setAttribute('data-toggle','modal');
                    item_text.setAttribute('data-target',_user_info.modal.id);
                    item_text.addEventListener('click',function () {_user_info.render(item)});
                }
            });
        }
        return container;
    },
}

//@ LIBRARY : _user_info
//@ HANDLE  : bootstrap user account UI popup
//@ VERSION : 2
window._user_info = {
    modal : {
        id : undefined,
        container : undefined,
        head : undefined,
        body : undefined,
    },
    init : function (id) {
        const temp           = _ui_factory._user_info.ui_modal(id);
        this.modal.id        = id;
        this.modal.container = temp[0];
        this.modal.head      = temp[1];
        this.modal.body      = temp[2];
    },
    render : function (item) {
        const uif_lib        = _ui_factory._user_info;
        const modal_body     = _user_info.modal.body;
        const temp           = uif_lib.ui_all(item.has_pic);
        const entity         = item.entity;
        const row_pic        = temp[0];
        const row_info       = temp[1];
        const row_ext        = temp[2];
        const pic            = temp[3];
        const namefield      = temp[4];
        const idfield        = temp[5];
        if (item.has_pic)
            pic.setAttribute('src',item.pic);
        else
            pic.innerHTML = item.pic;
        namefield.innerHTML  = item.nama;
        idfield.innerHTML    = item.id;
        modal_body.innerHTML = '';
        modal_body.appendChild(row_pic);
        modal_body.appendChild(row_info);
        modal_body.appendChild(row_ext);
        if (entity === 'student') {
            const temp        = uif_lib.ui_ext_student();
            const container   = temp[0];
            const field_1     = temp[1];
            const field_2     = temp[2];
            let title         = item.doc_title;
            let progres;
            if (title == null) {
                title         = 'tidak ada';
                progres       = 'belum ada';
            }
            else {
                if (item.examiners != null) {
                    if (item.examiners.exm_1 && item.examiners.exm_2)
                        progres = 'disubmit';
                    else
                        progres = 'sedang diuji';
                }
                else {
                    if (item.plagiarism != null)
                        progres = 'sedang memeriksa plagiasi';
                    else {
                        if (item.examiners != null)
                            progres = 'sedang dalam pengerjaan';
                        else
                            progres = 'belum ada progres';
                    }
                }
            }

            field_1.innerHTML = item.department+' / '+item.faculty;
            field_2.innerHTML = title+' / '+progres;
            row_ext.appendChild(container);
        }
        else if (entity === 'lecturer') {
            const temp        = uif_lib.ui_ext_lecturer();
            const container   = temp[0];
            const field_1     = temp[1];
            const field_2     = temp[2];
            const field_3     = temp[3];
            field_1.appendChild(_popover.render({
                title : 'aktif bimbingan',
                items : [],
            }));
            field_2.innerHTML = item.advise.length+' berkas';
            field_3.appendChild(_taglist.render({
                element : 'div',
                keys : item.keys_most
            }));
            row_ext.appendChild(container);
        }
        else if(entity === 'department') {
            const temp        = uif_lib.ui_ext_department();
            const container   = temp[0];
            const field_1     = temp[1];
            const field_2     = temp[2];
            const field_3     = temp[3];
            field_1.innerHTML = item.faculty;
            field_2.appendChild(_popover.render({
                title : 'dosen',
                items : [],
            }));
            field_3.innerHTML = item.document.length+' berkas';
            row_ext.appendChild(container);
        }
        else if(entity === 'faculty') {
            const temp        = uif_lib.ui_ext_faculty();
            const container   = temp[0];
            const field_1     = temp[1];
            const field_2     = temp[2];
            field_1.appendChild(_popover.render({
                title : 'jurusan',
                items : [],
            }));
            field_2.innerHTML = item.document.length+' berkas';
            row_ext.appendChild(container);
        }
        else if (entity === 'super') {
            const temp        = uif_lib.ui_ext_super();
            const container   = temp[0];
            const field_1     = temp[1];
            const field_2     = temp[2];
            field_1.appendChild(_popover.render({
                title : 'fakultas',
                items : [],
            }));
            field_2.innerHTML = item.document.length+' berkas';
            row_ext.appendChild(container);
        }
    },
}

//@ LIBRARY : _tables
//@ HANDLE  : datatables UI
//@ VERSION : 2
window._tables = {
    datatable : {
        table_att_class : 'table table-striped table-bordered display',
        tr_head_att_class : ' _none',
        th_head_att_class : ' _none',
        tr_body_att_class : ' _none',
    },
    custom : {
        table_att_class : 'table no-wrap v-middle mb-0',
        tr_head_att_class : 'border-0',
        th_head_att_class : ' border-0 font-14 font-weight-medium text-muted',
        tr_body_att_class : ' border-0',
    },
    memory : {},
    count  : {},
    template : {},
    default_message : 'Tidak ada data yang tersedia',
    default_search : 'Cari : ',
    default_show : 'Tampil ',
    default_entries : ' entri',
    default_previous : 'Sebelum',
    default_next : 'Berikutnya',
    render : function (input) {
        const uif_lib = window._ui_factory._tables;
        const temp_ui = uif_lib.ui_container(input.element);
        let option    = input.option;
        let column    = input.column;
        let template  = this.datatable;
        if (input.template !== undefined)
            if (input.template === 'custom')
                template = _tables.custom;
        temp_ui[1].setAttribute('class',template.table_att_class);
        temp_ui[2].setAttribute('class',template.tr_head_att_class);
        const head_row = document.createElement('tr');
        head_row.setAttribute('class',template.tr_head_att_class);
        temp_ui[2].appendChild(head_row);
        for (let i = 0; i < column.length; i++) {
            const col_content = column[i].content;
            const head_col    = document.createElement('th');
            let   col_class   = column[i].class;
            if (col_class !== undefined)
                head_col.setAttribute('class',column[i].class+template.th_head_att_class);
            else
                head_col.setAttribute('class',template.th_head_att_class);
            if (column[i].style !== undefined)
                head_col.setAttribute('style',column[i].style);
            if (typeof col_content === 'object')
                head_col.appendChild(col_content);
            else
                head_col.innerHTML = col_content;
            head_row.appendChild(head_col);
        }
        if (template === this.datatable) {
            if (option !== undefined) {
                $(temp_ui[1]).DataTable(option);
            }
            else {
                $(temp_ui[1]).DataTable();
            }
            temp_ui[3].innerHTML = '<tr class="odd"><td valign="top" colspan="3" class="dataTables_empty">'+this.default_message+'</td></tr>';
            temp_ui[0].firstChild.firstChild.children[1].firstChild.firstChild.firstChild.nodeValue = this.default_search;
            temp_ui[0].firstChild.firstChild.firstChild.firstChild.firstChild.firstChild.nodeValue = this.default_show;
            temp_ui[0].firstChild.firstChild.firstChild.firstChild.firstChild.childNodes[2].nodeValue = this.default_entries;
            temp_ui[0].firstChild.children[2].lastChild.firstChild.firstChild.firstChild.firstChild.innerText = this.default_previous;
            temp_ui[0].firstChild.children[2].lastChild.firstChild.firstChild.lastChild.firstChild.innerText = this.default_next;
            temp_ui[0].firstChild.lastChild.firstChild.firstChild.setAttribute('class',temp_ui[0].firstChild.lastChild.firstChild.firstChild.getAttribute('class')+' d-none');
        }
        this.memory[input.element] = temp_ui;
        this.count[input.element]  = 0;
        this.template[input.element]  = template;
        return temp_ui[0];
    },
    insert : function (input) {
        const uif_lib    = window._ui_factory._tables;
        const temp_ui    = this.memory[input.element][3];
        const temp_templ = this.template[input.element];
        const temp_count = this.count[input.element]+1;
        const row        = uif_lib.insert_row(input.column,temp_templ.tr_body_att_class)[0];
        this.count[input.element] = temp_count;
        if (temp_ui.children.length === 1)
            if (temp_ui.children[0].getAttribute('class') === 'odd')
                temp_ui.removeChild(temp_ui.firstChild);
        row.setAttribute('data-row',temp_count+'');
        row.setAttribute('class',temp_templ.tr_body_att_class);
        temp_ui.appendChild(row);
        return (temp_count)+'';
    },
    remove : function (table, row_id) {
        row_id        = row_id+'';
        const temp_ui = this.memory[table][3];
        const child   = temp_ui.children;
        for (let i = 0; i < child.length; i++) {
            if (child[i].getAttribute('data-row') === row_id) {
                temp_ui.removeChild(child[i]);
                break;
            }
        }
        if (child.length === 0) {
            temp_ui.innerHTML = '<tr class="odd"><td valign="top" colspan="3" class="dataTables_empty">'+this.default_message+'</td></tr>';
        }
    }
}

//@ LIBRARY : _navcard
//@ HANDLE  : head navigation card UI
//@ VERSION : 1
window._navcard = {
    memory : {},
    render : function (input) {
        const uif_lib  = _ui_factory._navcard;
        const element  = input.element;
        const ctr      = uif_lib.card(element)[0];
        const items    = input.items;
        for (let i = 0; i < items.length; i++) {
            const temp        = uif_lib.item();
            temp[1].innerHTML = items[i].value+'';
            temp[3].innerHTML = items[i].label;
            temp[4].setAttribute('data-feather',items[i].icon);
            if (i === items.length-1)
                temp[0].setAttribute('class','card');
            ctr.appendChild(temp[0]);
            this.memory[items[i].id] = temp;
        }
    },
    success : function (id, value='+') {
        const uif_lib  = _ui_factory._navcard;
        const stat     = this.memory[id][2];
        stat.innerHTML = '+'+value;
        uif_lib.success(stat);
    },
    danger : function (id, value='-') {
        const uif_lib  = _ui_factory._navcard;
        const stat     = this.memory[id][2];
        stat.innerHTML = '-'+value;
        uif_lib.danger(stat);
    },
    hide : function (id) {
        const uif_lib  = _ui_factory._navcard;
        const stat     = this.memory[id][2];
        stat.innerHTML = '';
        uif_lib.hide(stat);
    },
}

//@ LIBRARY : _linechart
//@ HANDLE  : display line chart graphics UI
//@ VERSION : 2
window._linechart = {
    pointSize : 3,
    fillOpacity : 0,
    behaveLikeLine :!0,
    gridLineColor : "#e0e0e0",
    lineWidth : 3,
    hideHover : "auto",
    resize : !0,
    memory : {},
    render : function (input) {
        const palette = _ui_factory.__pic.palette;
        const uif_lib = _ui_factory._linechart;
        const temp_ui = uif_lib.container(input.element);
        const data    = input.data;
        const label   = input.label;
        const x       = input.x;
        const y       = input.y;
        let pointStrokeColors;
        pointStrokeColors = [];
        let iter = 0;
        for (let i = 0; i < y.length; i++) {
            if (iter === palette.length)
                iter = 0;
            pointStrokeColors.push(palette[iter]);
            temp_ui[2].appendChild(uif_lib.item(y[i],palette[iter])[0]);
            iter++;
        }
        Morris.Area({
            element : temp_ui[1],
            data : data,
            xkey : x,
            ykeys : y,
            labels : label,
            pointSize : this.pointSize,
            fillOpacity : this.fillOpacity,
            pointStrokeColors : pointStrokeColors,
            lineColors : pointStrokeColors,
            behaveLikeLine : this.behaveLikeLine,
            gridLineColor : this.gridLineColor,
            lineWidth : this.lineWidth,
            hideHover : this.hideHover,
            resize : this.resize
        });

        this.memory[input.element] = temp_ui;

        return temp_ui[0];
    }
}

window._popup = {
    render : function (input) {
        const uif_lib = _ui_factory._popup;
        if (typeof input.element === 'string')
            input.element = document.getElementById(input.element);
        const res = uif_lib.card(input.element);
        if (typeof input.title === 'string')
            res[1].innerHTML = input.title;
        else
            res[1].append(input.title);
        if (typeof input.content === 'string')
            res[2].innerHTML = input.content;
        else
            res[2].append(input.content);

        return res[0];
    },
}
