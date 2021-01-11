<?php
/** @noinspection PhpPossiblePolymorphicInvocationInspection */
/** @noinspection PhpUndefinedMethodInspection */


namespace App\Http\back;


use App\Models\Previlege;
use App\Models\Super;
use App\Models\Template;
use App\Models\Token;
use App\Models\User;

class _Super {

    public static function init($order): Super
    {
        $user = new User();
        $super = new Super();

        $user->identity = $order->identity;
        $user->name = $order->name;
        $user->email = $order->email;
        $user->password = $order->password;
        $user->pic = $order->pic;
        $user->role = 'super';
        $user->save();

        $super->city = $order->city;
        $user->super()->save($super);
        $super->token()->save(self::token($super->id, $order->token, $order->previlege->id));
        $super->templates()->save(self::default_template());

        $user->super()->save($super);

        return $super;
    }

    public static function update($super, $previlege) {

    }

    public static function quota_template(): bool {
        if (_Authorize::login()) {
            if (_Authorize::developer() || _Authorize::advisor() || _Authorize::student())
                return false;

            $super     = self::super(_Authorize::data());
            $templates = $super->templates()->count();
            $previlege = self::previleges($super);

            return $templates < $previlege->quota_template;
        }

        return false;
    }

    public static function quota_faculty():bool {
        if (_Authorize::login()) {
            if (_Authorize::developer() || _Authorize::advisor() || _Authorize::student() || _Authorize::department())
                return false;

            $super     = self::super(_Authorize::data());
            $faculties = $super->faculties()->count();
            $previlege = self::previleges($super);

            return $faculties < $previlege->quota_faculty;
        }

        return false;
    }

    public static function quota_department():bool {
        if (_Authorize::login()) {
            if (_Authorize::developer() || _Authorize::department() || _Authorize::advisor() || _Authorize::student())
                return false;

            $super      = self::super(_Authorize::data());
            $department = $super->departments()->count();
            $previleges = self::previleges($super);

            return $department < $previleges->quota_department;
        }

        return false;
    }

    public static function quota_advisor():bool {
        if (_Authorize::login()) {
            if (_Authorize::developer() || _Authorize::advisor() || _Authorize::student())
                return false;

            $super     = self::super(_Authorize::data());
            $advisors  = $super->advisors()->count();
            $previlege = self::previleges($super);

            return $advisors < $previlege->quota_advisor;
        }

        return false;
    }

    public static function quota_student():bool {
        if (_Authorize::login()) {
            if (_Authorize::developer() || _Authorize::student() || _Authorize::advisor())
                return false;

            $super     = self::super(_Authorize::data());
            $student   = $super->students()->count();
            $previlege = self::previleges($super);

            return $student < $previlege->quota_student;
        }

        return false;
    }

    public static function quota_document():bool {
        if (_Authorize::login()) {
            if (_Authorize::developer() || _Authorize::student() || _Authorize::advisor())
                return false;

            $super     = self::super(_Authorize::data());
            $document  = $super->documents()->count();
            $previlege = self::previleges($super);

            return $document < $previlege->quota_document;
        }

        return false;
    }

    private static function default_template(): Template {
        $template             = new Template();
        $template->default    = true;
        $template->name       = 'default';
        $template->stylesheet = 'body {font-size : 12.25pt;line-height : 1.8em;letter-spacing: 0.05em;}#pg-lembar_persetujuan {counter-reset : page 1;}#bab-i {counter-reset : page 1;}#set-bab-i {counter-reset : bab 1;}#set-bab-ii {counter-reset : bab 2;}#set-bab-iii {counter-reset : bab 3;}#set-bab-iv {counter-reset : bab 4;}#set-bab-v {counter-reset : bab 5;}.reset-sub {counter-reset : sub-1;}.sub-1 {counter-increment : sub-1;counter-reset : sub-2;}.sub-2 {counter-increment : sub-2;counter-reset : sub-3;}.sub-3 {counter-increment : sub-3;counter-reset : sub-4;}.sub-4 {counter-increment : sub-4;counter-reset : sub-5;}.sub-5 {counter-increment : sub-5;counter-reset : sub-6;}.sub-6 {counter-increment : sub-6;}.sub-1::before {content : counter(bab) "." counter(sub-1) " ";}.sub-2::before {content : counter(bab) "." counter(sub-1) "." counter(sub-2) " ";}.sub-3::before {content : counter(bab) "." counter(sub-1) "." counter(sub-2) "." counter(sub-3) " ";}.sub-4::before {content : counter(bab) "." counter(sub-1) "." counter(sub-2) "." counter(sub-3) "." counter(sub-4) " ";}.sub-5::before {content : counter(bab) "." counter(sub-1) "." counter(sub-2) "." counter(sub-3) "." counter(sub-4) "." counter(sub-5) " ";}.sub-6::before {content : counter(bab) "." counter(sub-1) "." counter(sub-2) "." counter(sub-3) "." counter(sub-4) "." counter(sub-5) "." counter(sub-6) " ";}#lampiran {counter-reset : lampiran-idx;}.ls-lampiran {counter-increment : lampiran-idx;}.ls-lampiran-title > div::before {content : "Lampiran " counter(lampiran-idx) " ";}.reset-img {counter-reset : image-idx;}.image-dsc {counter-increment : image-idx;}.image-dsc::before {font-weight : bold;content : "Gambar " counter(bab) "." counter(image-idx) ". ";}.lampiran-img > .image-dsc {font-weight : bold;content : "Gambar " counter(image-idx) ". ";}.lampiran-img-hidden > .image-dsc {content : "";}.reset-tbl {counter-reset : table-idx;}.table-dsc {counter-increment : table-idx;}.table-dsc::before {font-weight : bold;content : "Tabel " counter(bab) "." counter(table-idx) ". ";}.lampiran-tbl > .table-dsc::before {font-weight : bold;content : "Tabel " counter(table-idx) ". ";}.lampiran-tbl-hidden > .table-dsc::before {content : "";}.reset-alpha-ls {counter-reset : alpha-ls;}.ls-alpha {counter-increment : alpha-ls;}.ls-alpha::before {content : counter(alpha-ls,lower-alpha) ") ";}.reset-num-ls {counter-reset : num-ls 0;}.ls-num {counter-increment : num-ls;}.ls-num::before {content : counter(num-ls) ". ";}.reset-ref-ls {counter-reset : ref-ls;}.ls-ref {counter-increment : ref-ls;}.ls-ref::before {content : "[" counter(ref-ls) "] ";}.set-dfi-bab-i {counter-reset : dfi-bab-idx 1;}.set-dfi-bab-ii {counter-reset : dfi-bab-idx 2;}.set-dfi-bab-iii {counter-reset : dfi-bab-idx 3;}.set-dfi-bab-iv {counter-reset : dfi-bab-idx 4;}.set-dfi-bab-v {counter-reset : dfi-bab-idx 5;}.reset-dfi-sub {counter-reset : dfi-sub-1;}.dfi-sub-i {counter-increment : dfi-sub-1;counter-reset : dfi-sub-2;}.dfi-sub-ii {counter-increment : dfi-sub-2;counter-reset : dfi-sub-3;}.dfi-sub-iii {counter-increment : dfi-sub-3;counter-reset : dfi-sub-4;}.dfi-sub-iv {counter-increment : dfi-sub-4;counter-reset : dfi-sub-5;}.dfi-sub-v {counter-increment : dfi-sub-5;counter-reset : dfi-sub-6;}.dfi-sub-vi {counter-increment : dfi-sub-6;}.dfi-sub-i::before {background-color : white;font-weight : bold;content : counter(dfi-bab-idx) "." counter(dfi-sub-1) " ";}.dfi-sub-ii::before {background-color : white;font-weight : bold;content : counter(dfi-bab-idx) "." counter(dfi-sub-1) "." counter(dfi-sub-2) " ";}.dfi-sub-iii::before {background-color : white;font-weight : bold;content : counter(dfi-bab-idx) "." counter(dfi-sub-1) "." counter(dfi-sub-2) "." counter(dfi-sub-3) " ";}.dfi-sub-iv::before {background-color : white;font-weight : bold;content : counter(dfi-bab-idx) "." counter(dfi-sub-1) "." counter(dfi-sub-2) "." counter(dfi-sub-3) "." counter(dfi-sub-4) " ";}.dfi-sub-v::before {background-color : white;font-weight : bold;content : counter(dfi-bab-idx) "." counter(dfi-sub-1) "." counter(dfi-sub-2) "." counter(dfi-sub-3) "." counter(dfi-sub-4) "." counter(dfi-sub-5) " ";}.dfi-sub-vi::before {background-color : white;font-weight : bold;content : counter(dfi-bab-idx) "." counter(dfi-sub-1) "." counter(dfi-sub-2) "." counter(dfi-sub-3) "." counter(dfi-sub-4) "." counter(dfi-sub-5) "." counter(dfi-sub-6) ". ";}.reset-df-gambar {counter-reset : df-gambar-idx;}.df-gambar {counter-increment : df-gambar-idx ;}.df-gambar::before {background-color : white;font-weight : bold;content : " Gambar " counter(dfi-bab-idx) "." counter(df-gambar-idx) ". ";}.reset-df-tabel {counter-reset : df-tabel-idx;}.df-tabel {counter-increment : df-tabel-idx ;}.df-tabel::before {background-color : white;font-weight : bold;content : "Tabel " counter(dfi-bab-idx) "." counter(df-tabel-idx) ". ";}.reset-df-lampiran {counter-reset : df-lampiran-idx;}.df-lampiran {counter-increment : df-lampiran-idx ;}.df-lampiran::before {background-color : white;font-weight : bold;content : "Lampiran " counter(df-lampiran-idx) ". ";}.pendahuluan-sub-title {font-weight : bold;font-size : 14pt;text-transform : uppercase;line-height : 1.7em;text-align : center;margin-bottom : 0.5em;}.pendahuluan-sub-title > img {display : block;width : 220pt;margin : 0.5em auto 0;}#cover {page : cover;page-break-after : always;display : flex;flex-direction : column;width : 100%;height : 232mm;}#cov-head {font-size : 14pt;font-weight : bold;text-transform : uppercase;line-height : 1.5em;text-align : center;flex : 1;}#cov-head + div {line-height : 1.5em;text-transform : capitalize;text-align : center;flex : auto;}#cov-head + div + div {text-align : center;flex : auto;}#cov-head + div + div > img {width : 12em;}#cov-head + div + div + div {text-align : center;text-transform : capitalize;line-height : 1.7em;flex : auto;}#cov-head + div + div + div > span {font-weight : bold;}#cov-footer {font-weight : bold;font-size : 14pt;line-height : 1.7em;text-align : center;text-transform : uppercase;flex : 1;}#cov-footer .no-format {font-weight: normal;text-transform: none;}#pg-lembar_persetujuan , #pg-lembar_pengesahan , #pg-lembar_pernyataan {page : pendahuluan;text-align : center;width : 100%;height : 232mm;page-break-after : always;}#pg-lembar_persetujuan > img , #pg-lembar_pengesahan > img , #pg-lembar_pernyataan > img {width : 90%;position : relative;top : 13%;}#pg-lembar_abstrak , #pg-lembar_abstract {page : pendahuluan;width : 100%;height : 232mm;page-break-after : always;}#pg-lembar_persembahan , #pg-kata_pengantar {page : pendahuluan;width : 100%;height : 232mm;page-break-after : always;}#pg-lembar_persembahan > p , #pg-kata_pengantar-content > p {text-align : justify;line-height : 1.7em;font-size : 12pt;}#pg-lembar_persembahan > P + p , #pg-kata_pengantar-content > P + p{margin-top : -1em;}#pg-kata_pengantar-judul {text-align : center!important;text-transform : uppercase;font-size : 14pt;line-height : 1.7em;font-weight : bold;padding-top : 5px;}#pg-kata_pengantar {display : flex;flex-direction : column;}#pg-kata_pengantar-content , #pg-kata_pengantar-info{flex : 1;}#pg-kata_pengantar > div {flex : auto;}#pg-kata_pengantar-info {text-align : right;}#pg-kata_pengantar-info > br + span {font-weight : bold;}#pg-daftar_isi {page : pendahuluan;width : 100%;}#pg-daftar_isi > ul {padding-left : 0;margin : 1.5em 0 0;list-style-type : none;}#pg-daftar_isi > ul > li {color : inherit;text-transform : capitalize;font-weight : bold;overflow-x : hidden;line-height : 1.5em;}#pg-daftar_isi > ul > li > span {background-color : white;}#pg-daftar_isi > ul > li::after {font-weight : normal;float : left;width : 0;white-space : nowrap;letter-spacing : -0.5pt;content : "..................................................................................................................................................................................................................";}.di-b {text-transform : uppercase;}.di-s1 {margin-left : 1em;}.di-s2 {margin-left : 2em;}.di-s3 {margin-left : 3em;}.di-s4 {margin-left : 4em;}.di-s5 {margin-left : 5em;}.di-s6 {margin-left : 6em;}#pg-daftar_isi > ul > li > a {float : right;text-transform : lowercase;color : inherit;text-decoration : none;}#pg-daftar_isi > ul > li > .pen-idx::after {position : relative;z-index : 2;background-color : white;content : " " target-counter(attr(href),page, lower-roman);}#pg-daftar_isi > ul > li > .con-idx::after {position : relative;z-index : 2;background-color : white;content : " " target-counter(attr(href),page, "");}#pg-daftar_gambar_tabel_lampiran {page-break-before: always;page : pendahuluan;width : 100%;}#daftar_gambar , #daftar_tabel , #daftar_lampiran {padding-left : 0;margin : 1.5em 0 0;list-style-type : none;}#daftar_gambar > li , #daftar_tabel > li , #daftar_lampiran > li {color : inherit;text-transform : capitalize;font-weight : bold;overflow-x : hidden;line-height : 1.5em;}#daftar_gambar > li > span , #daftar_tabel > li > span , #daftar_lampiran > li > span {background-color : white;}#daftar_gambar > li::after , #daftar_tabel > li::after , #daftar_lampiran > li::after {font-weight : normal;float : left;width : 0;white-space : nowrap;letter-spacing : -0.5pt;content : "..................................................................................................................................................................................................................";}#daftar_gambar > li > a::after , #daftar_tabel > li > a::after , #daftar_lampiran > li > a::after {float : right;text-transform : lowercase;color : black;text-decoration : none;position : relative;z-index : 2;background-color : white;content : " " target-counter(attr(href),page, "");}#daftar-pustaka , #lampiran{page-break-before : always;font-weight : bold;text-align : center;line-height : 1.5em;}#daftar-pustaka::after {white-space : pre;content : "DAFTAR PUSTAKA \A\A";}#lampiran::after {white-space : pre;content : "LAMPIRAN \A\A";}.ls-lampiran {page-break-before : always;width : 100%;display : flex;flex-direction : row;}#lampiran + .ls-lampiran {page-break-before : avoid;}.ls-lampiran > div:first-child {border : 1px black solid;border-right : 0;}.ls-lampiran > div:last-child {border : 1px black solid;flex : auto;text-align : center;}.ls-lampiran-logo > img {width : 5em;}.ls-lampiran > div:last-child > div {font-weight : bold;position : relative;top : 45%;}.bab {font-weight : bold;text-transform : uppercase;line-height : 1em;text-align : center;margin-bottom : 0.25em;}#bab-ii , #bab-iii , #bab-iv , #bab-v {page-break-before : always;}#bab-i::after {white-space : pre;content : "BAB I \A\A PENDAHULUAN \A\A";}#bab-ii::after {white-space : pre;content : "BAB II \A\A KAJIAN TEORI \A\A";}#bab-iii::after {white-space : pre;content : "BAB III \A\A METODOLOGI PENELITIAN \A\A";}#bab-iv::after {white-space : pre;content : "BAB IV \A\A IMPLEMENTASI DAN PENGUJIAN \A\A";}#bab-v::after {white-space : pre;content : "BAB V \A\A KESIMPULAN \A\A";}.sub {font-weight : bold;text-transform : capitalize;}p {text-align : justify;text-indent : 22pt;margin-left : 22pt;}.sub + p {margin-top : -0.25pt;}.reset-num-ls + .sub, .reset-alpha-ls + .sub{margin-top: 12pt;}p + p {margin-top : -10pt;}span + p {margin-top : -2pt;}p + .ls-alpha , p + .ls-num {margin-top : -1em;}.image {margin-top : 0.5em;margin-left : 22pt;margin-bottom : 1em;text-align : center;}.image-dsc {margin-top : 0.25em;}.img-xs {width : 15%;}.img-sm {width : 25%;}.img-md {width : 50%;}.img-lg {width : 75%;}.img-xl {width : 100%;}.table {margin-top : 0.2em;margin-left : 22pt;margin-bottom : 0.6em;text-align : center;}table {margin : 0 auto;border-collapse : collapse;}td {border : 1px solid black;text-align : justify;padding : 2pt 4pt;}table tr:first-child td {text-align : center;}table tr:first-child {background-color : darkgray;font-weight : bold;}.table-dsc {display : table;margin : 0.6em auto 0.2em;}.tbl-xs {max-width : 20%;}.tbl-sm {max-width : 45%;}.tbl-md {max-width : 60%;}.tbl-lg {max-width : 75%;}.tbl-xl {max-width : 100%;}.ls-alpha , .ls-num {text-align : justify;text-indent: -0.8rem;margin-left: 3.5rem;}.ls-alpha::before , .ls-num::before {min-width: 0.75rem;display: inline-block;}.ls-ref {text-indent : -2.1em;margin-left : 1.8em;}.ls-ref::before {margin-right : 0.75em;}@page {size : A4;margin : 3cm 3cm 3cm 4cm;background-image : url("{{asset(env(\'SKRIPDOWN_PATH\').\'watermark.jpg\')}}");background-repeat : no-repeat;background-position : 42.5mm 67mm;@bottom-center {content : counter(page);}}@page cover {@bottom-center {content : none;}}@page pendahuluan {@bottom-center {content : counter(page, lower-roman);}}';

        return $template;
    }

    private static function token($super, $key, $previlege):Token {
        if (Token::all()->where('token',$key)->count() == 0) {
            $token = new Token();
            $token->token = $key;
        }
        else
            $token = Token::all()->where('token',$key)->first();

        $token->previlege_id = $previlege;
        $token->super_id = $super;

        return $token;
    }

    private static function super($user) {
        if (_Authorize::super())
            $super = $user->super()->first();
        elseif (_Authorize::faculty())
            $super = $user->faculty()->first()->super()->first();
        else
            $super = $user->department()->first()->super()->first();

        return $super;
    }

    private static function previleges($super) {
        return $super->token()->first()->previlege()->first();
    }
}
