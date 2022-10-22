<?php

namespace App\Http\Controllers;

use App\Models\Omset;
use Illuminate\Http\Request;
use PDF;
use App\Exports\OmsetExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function database()
    {
        $mysqlHostName      = env('DB_HOST');
        $mysqlUserName      = env('DB_USERNAME');
        $mysqlPassword      = env('DB_PASSWORD');
        $DbName             = env('DB_DATABASE');
        $tables             = array("users", "omset", "migrations");

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword", array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();


        $output = '';
        foreach ($tables as $table) {
            $show_table_query = "SHOW CREATE TABLE " . $table . "";
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();

            foreach ($show_table_result as $show_table_row) {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();

            for ($count = 0; $count < $total_row; $count++) {
                $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $output .= "\nINSERT INTO $table (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";

                foreach($table_value_array as $key => $value) {
                    if($key < count($table_value_array) - 1) {
                        if($value == null) {
                            $output .= "null, ";
                        } else {
                            $output .= "'" . $value . "', ";
                        }
                    } else {
                        if ($value == null) {
                            $output .= "null, ";
                        } else {
                            $output .= "'" . $value . "'";
                        }
                    }
                }
                $output .= ");\n";
            }
        }
        $file_name = 'database_backup_on_' . date('y-m-d') . '.sql';
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);
    }

    public function excel(Request $request)
    {
        if ($request->bulan && $request->tahun) {
            $filter = $request->tahun . '-' . $request->bulan . '-%';
            $omsets = Omset::where('created_at', 'LIKE', $filter)->orderBy("id", "desc")->get();
        } else {
            $omsets = Omset::orderBy("id", "desc")->get();
        }

        return Excel::download(new OmsetExport($omsets), 'Laporan-Omset-Pendapatan.xlsx');
    }

    public function word(Request $request)
    {
        if ($request->bulan && $request->tahun) {
            $filter = $request->tahun . '-' . $request->bulan . '-%';
            $omsets = Omset::where('created_at', 'LIKE', $filter)->orderBy("id", "desc")->get();
        } else {
            $omsets = Omset::orderBy("id", "desc")->get();
        }

        $template = asset('LaporanTemplate.docx');
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template);

        $templateProcessor->setValue('judul', "Laporan Omset Pendapatan CV. Citra Berkah Express");
        $templateProcessor->setValue('total', rupiah($omsets->sum('jumlah_omset_bersih')));

        $no = 1;
        $templateProcessor->cloneRow('no', $omsets->count());
        foreach ($omsets as $omset) {
            $templateProcessor->setValue('no#' . $no, $no);
            $templateProcessor->setValue('tanggal#' . $no, $omset->created_at->format('Y-m-d'));
            $templateProcessor->setValue('nopol#' . $no, $omset->nopol);
            $templateProcessor->setValue('nama_supir#' . $no, $omset->nama_supir);
            $templateProcessor->setValue('biaya_mobil#' . $no, rupiah($omset->biaya_mobil));
            $templateProcessor->setValue('pengeluaran_jkt#' . $no, rupiah($omset->pengeluaran_jkt));
            $templateProcessor->setValue('pengeluaran_lpg#' . $no, rupiah($omset->pengeluaran_lpg));
            $templateProcessor->setValue('jumlah#' . $no, rupiah($omset->jumlah_omset_bersih));
            $no++;
        }

        $templateProcessor->saveAs('Laporan-Omset-Pendapatan');
        return response()->download(public_path('Laporan-Omset-Pendapatan'));
    }

    public function pdf(Request $request)
    {
        if ($request->bulan && $request->tahun) {
            $filter = $request->tahun . '-' . $request->bulan . '-%';
            $omsets = Omset::where('created_at', 'LIKE', $filter)->orderBy("id", "desc")->get();
        } else {
            $omsets = Omset::orderBy("id", "desc")->get();
        }
        $pdf = PDF::loadview('exports.pdf', ['omsets' => $omsets]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('Laporan-Omset-Pendapatan-CV-Citra-Berkah-Express.pdf');
    }
}
