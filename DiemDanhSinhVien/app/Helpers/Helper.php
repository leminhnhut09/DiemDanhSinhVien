<?php

namespace app\Helper;

class Helper
{
    public static function LichMonHoc()
    {

        $html  = ' <p>aaa</p>';
        $html .= '
        
        <td> 
        <a class="btn btn-primary"href="/admin/menus/edit/' . 1 . '">
            <i class="fas fa-edit"></i>
        </a>

        <a class="btn btn-danger" href="#" onclick="removeRow(' . 1 . ', \'/admin/menus/destroy\')">
            <i class="fas fa-trash"></i>
        </a>
    </td>
        
        ';
        // $html .= '<div class="content  text-left" data-bg="129872" style="text-align:left">
        // <b><a href="javascript:" target="" style="text-decoration:none;color: #003763;">Sinh hoạt giữa khóa</a></b>
        // <p>sinhhoatgiuakhoa - 010109729926</p>
        // <p>
        //     <span lang="lichtheotuan-tiet">Tiết</span>: 2 - 4<br>
        //     <span>
        // </span></p><p lang="giang-duong">Phòng</p>: Zoom17

        // <p></p>

        //         <div>
        //             <label class="switch">
        //                 <input type="checkbox" checked="" disabled="">
        //                 <span>
        //                     <em></em>
        //                     <strong></strong>
        //                 </span>
        //             </label>
        //         </div>


        // </div>';

        return $html;
    }
}
