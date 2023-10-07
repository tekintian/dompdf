<?php
namespace Dompdf\Tests;

use Dompdf\Dompdf;
use Dompdf\Tests\TestCase;

class MakePdfTest extends TestCase
{
    public function testMakepdf()
    {

        //初始化Dompdf对象
        $dompdf = new Dompdf();

        //创建HTML内容
        $html = '<h1 style="font-size:5rem;color:blue;">你好Dompdf!</h1><h2>我默认使用的是中文字体</h2>';
        $dompdf->loadHtml($html);

        //Setup the paper size and orientation
        // $dompdf->setPaper('A4', 'landscape');

        //将html转为PDF
        $dompdf->render();

        //Output the generated PDF to Browser
        $pdfname = '你好PDF.pdf';
        //下载生成的pdf文件
        $dompdf->stream($pdfname);

        //将生成的pdf保存到服务器
        file_put_contents($pdfname, $dompdf->output());

        //将生成的pdf文件渲染到页面
        // $dompdf->stream($pdfname, [
        //     'compress' => 0,
        //     'Attachment' => 0
        // ]);

        $this->assertEquals($pdfname,'你好PDF.pdf');
    }
}
