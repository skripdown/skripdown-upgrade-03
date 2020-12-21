<?php
/** @noinspection PhpUndefinedMethodInspection */

namespace App\Http\back;


use App\Models\Advise;
use App\Models\Advisor;
use App\Models\DepartmentKeyword;
use App\Models\Document;
use App\Models\DocumentKeyword;
use App\Models\Keyword;

class _Analyzer {
    public static function analyze_doc($document) {
        $id          = $document->id;
        $advisors    = $document->advisors;
        $meta        = $document->meta;
        $content     = $document->content;
        $attachment  = $document->attachment;
        $keywords    = $document->keyword;
        $university  = $document->university_id;

        $id_dupp     = array();
        foreach ($advisors as $item) {
            $advisor = Advisor
                ::with([
                    'user'=>function($query) use ($item) {
                        $query->where('identity',$item->identity);
                    }
                ])
                ->where('super_id',$university)
                ->count();
            if ($advisor != 0) {
                $advisor = Advisor
                    ::with([
                        'user'=>function($query) use ($item) {
                            $query->where('identity',$item->identity);
                        }
                    ])
                    ->where('super_id',$university)
                    ->first();
                $advises  = Advise::all()
                    ->where('advisor_id',$advisor->id)
                    ->where('document_id',$id)
                    ->count();
                $item->valid = true;
                if ($advises > 0)
                    $item->verified = true;
                else
                    $item->verified = false;
            }
            else {
                $item->valid    = false;
                $item->verified = false;
            }
            if (isset($id_dupp[$item->identity]))
                $item->duplicated     = true;
            else
                $item->duplicated     = false;
            $id_dupp[$item->identity] = true;
        }

        $doc                 = Document::all()->where('id',$id)->first();
        $doc->meta           = $meta->raw;
        $doc->title          = $meta->title;
        $doc->citation       = $meta->citation;
        $doc->preface        = $meta->preface;
        $doc->content        = $content->raw;
        $doc->parsed_content = $content->html;
        $doc->chapter_i      = $content->chapter_i;
        $doc->chapter_ii     = $content->chapter_ii;
        $doc->chapter_iii    = $content->chapter_iii;
        $doc->chapter_iv     = $content->chapter_iv;
        $doc->chapter_v      = $content->chapter_v;
        $doc->attachment     = $attachment->raw;
        $doc->save();

        $document_key        = DocumentKeyword::all()->where('document_id',$doc->id);
        $department          = $doc->department_id;
        foreach ($document_key as $doc_key) {
            $doc_key_id      = $doc_key->keyword_id;
            $keyword_count   = DepartmentKeyword::all()
                ->where('keyword_id',$doc_key_id)
                ->where('department_id',$department)
                ->count();
            if ($keyword_count == 1) {
                DepartmentKeyword::all()
                    ->where('keyword_id',$doc_key_id)
                    ->where('department_id',$department)
                    ->delete();
            }
        }

        DocumentKeyword::all()->where('document_id',$doc->id)->delete();
        foreach ($keywords as $keyword) {
            $docKey                = new DocumentKeyword();
            $key                   = Keyword::findOrCreate($keyword);
            $docKey->document_id   = $doc->id;
            $docKey->keyword_id    = $key->id;
            $docKey->save();
            $keyword_count         = DepartmentKeyword::all()
                ->where('keyword_id',$key->id)
                ->where('department_id',$department)
                ->count();
            if ($keyword_count == 0) {
                $department_keyword = new DepartmentKeyword();
                $department_keyword->department_id = $department;
                $department_keyword->keyword_id    = $key->id;
                $department_keyword->save();
            }
        }

        $document->advisors = $advisors;

        return $document;
    }
}
