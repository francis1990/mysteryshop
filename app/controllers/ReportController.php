<?php

class ReportController extends BaseController {


    public function reportGroupMes()
    {
        $mes = 1;
        $group = "A";
        $datos = array();
       /* Excel::create("FileName", function ($excel) use ($datos) {
            $excel->setTitle("Title");
            $excel->sheet("Sheet 1", function ($sheet) use ($datos) {
                $sheet->loadView('report.report_group_mes')->with('datos', $datos);;
            });
        })->download('xls');*/
        //include (app_path() . "/lib/PHPExcel/Classes/PHPExcel.php");

        /*$objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()
            ->setCreator("Cattivo")
            ->setLastModifiedBy("Cattivo")
            ->setTitle("Documento Excel de Prueba")
            ->setSubject("Documento Excel de Prueba")
            ->setDescription("Demostracion sobre como crear archivos de Excel desde PHP.")
            ->setKeywords("Excel Office 2007 openxml php")
            ->setCategory("Pruebas de Excel");
        // Agregar Informacion
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Valor 1')
            ->setCellValue('B1', 'Valor 2')
            ->setCellValue('C1', 'Total')
            ->setCellValue('A2', '10')
            ->setCellValue('C2', '=sum(A2:B2)');

        // Renombrar Hoja
        $objPHPExcel->getActiveSheet()->setTitle('Tecnologia Simple');

        // Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="pruebaReal.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;*/


        /*include (app_path() . "/lib/PHPExcel/Classes/PHPExcel/IOFactory.php");
        $objPHPExcel = new PHPExcel();
        $inputFileType = PHPExcel_IOFactory::identify("Archivo.xls");
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load("Archivo.xls");
        $objPHPExcel->setActiveSheetIndex(0);
//Escribimos en la hoja en la celda B1
    $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Hola mundo');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="pruebaReal.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save("Archivo_salida.xlsx");
        exit;*/

        /** Incluir la libreria PHPExcel */

        require(app_path() . "/lib/PHPExcel/Classes/PHPExcel.php");
        require(app_path() .'/lib/PHPExcel/Classes/PHPExcel/Reader/Excel2007.php');
        /** Incluir función encargada de insertar la información de la base de datos */


        if (file_exists (app_path()."/excel/Archivo.xls"))
        {
            $extension = "xls";
// Cargando la hoja de cálculo
            if ($extension == "xls") { // Si es .xls o xlsx
                $objReader = new PHPExcel_Reader_Excel5();
            } else {
                $objReader = new PHPExcel_Reader_Excel2007();
            }
        }
        $objPHPExcel = $objReader->load(app_path()."/excel/Archivo.xls");
// Asignar hoja de excel activa
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="pruebaReal.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;

    }

    public function reportGroup()
    {
        if(Input::server("REQUEST_METHOD") == "POST")
        {
            $fechaIni = Input::get("fechaIni");
            $fechaFin = Input::get("fechaFin");
            //echo $fechaIni."  ".$fechaFin;die;
            $group_typeMarket = Input::get("group_type");
            //$fechaIni = '2017-04-01';
            //$fechaFin = '2017-04-31';
            //$group_typeMarket = "A";
            require(app_path() . "/lib/PHPExcel/Classes/PHPExcel.php");


            $objPHPExcel = new PHPExcel();
            //Propiedades
            $objPHPExcel->getProperties()
                ->setCreator("MysteryShop")
                ->setLastModifiedBy("MysteryShop")
                ->setTitle("Reporte x mes")
                ->setSubject("...")
                ->setDescription("...")
                ->setKeywords("...")
                ->setCategory("...");
            //ponemos activa la hoja en que se trabajara
            $objPHPExcel->getActiveSheetIndex(0);
            //Nombre de la primera hoja
            $objPHPExcel->getActiveSheet()->setTitle("Reporte");
            //Zoom
            //$objPHPExcel -> getActiveSheet() - > getSheetView() -> setZoomScale(75);
            //la fuente predeterminada
            $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
            $objPHPExcel -> getDefaultStyle()->getFont()->setSize(10);
            //Ancho de la primera columna
            $objPHPExcel ->getActiveSheet()->getColumnDimension('A')->setWidth(114);
            //Imagen
            $objDrawing = new PHPExcel_Worksheet_Drawing();
            $objDrawing -> setName('Logo');
            $objDrawing -> setDescription('Logo');
            $objDrawing -> setPath(public_path().'/assets/proyecto/excel/logo_excel.jpg');
            $objDrawing -> setHeight(70);
            $objDrawing -> setCoordinates('A1');
            $objDrawing -> setWorksheet($objPHPExcel->getActiveSheet());
            //tamaño de fila
            $objPHPExcel -> getActiveSheet()->getRowDimension('1')->setRowHeight(53);
            $objPHPExcel -> getActiveSheet()->getRowDimension('2')->setRowHeight(28);
            //color de fondo de una celda
            $objPHPExcel -> getActiveSheet()->getStyle('A2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FFFF99');
            //Stilo de un texto;
            $objRichText = new PHPExcel_RichText();
            $texto = $objRichText->createTextRun ('Customer Service Quality and Mystery Shop Report');
            $texto->getFont()
                ->setBold(true)
                ->setColor(new PHPExcel_Style_Color (PHPExcel_Style_Color::COLOR_BLACK))
                ->setSize(14)
                ->setName('Arial');
            $objRichText->createTextRun('                                                                                                                                       (Rating the following from 1-5:    5 = very satisfied  4 = satisfied  3 = average  2 = dissatisfied  1 = very dissatisfied)')->getFont()->setSize(8)->setName('Arial');
            $objPHPExcel->getActiveSheet()->getCell('A2')->setValue($objRichText);
            $objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setWrapText(true);
            //Alineacion del texto
            $objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
            //A3
            $objPHPExcel->getActiveSheet()->getStyle('A3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('DD0806');
            $objPHPExcel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objRichText = new PHPExcel_RichText();
            $objRichText->createTextRun('Store #:')->getFont()->setBold(true)->setName('Arial')->setSize(10);
            $objPHPExcel->getActiveSheet()->getCell('A3')->setValue($objRichText);
            //A4
            $objPHPExcel->getActiveSheet()->getStyle('A4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('CCFFFF');
            $objPHPExcel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objRichText = new PHPExcel_RichText();
            $objRichText->createTextRun('Date:')->getFont()->setBold(true)->setName('Arial')->setSize(10);
            $objPHPExcel->getActiveSheet()->getCell('A4')->setValue($objRichText);
            //A5
            $objPHPExcel->getActiveSheet()->getStyle('A5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FFCC99');
            $objPHPExcel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objRichText = new PHPExcel_RichText();
            $objRichText->createTextRun('Shopper:')->getFont()->setBold(true)->setName('Arial')->setSize(10);
            $objPHPExcel->getActiveSheet()->getCell('A5')->setValue($objRichText);
            //A6
            $objPHPExcel->getActiveSheet()->getStyle('A6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('CCFFFF');
            $objPHPExcel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objRichText = new PHPExcel_RichText();
            $objRichText->createTextRun('Time:')->getFont()->setBold(true)->setName('Arial')->setSize(10);
            $objPHPExcel->getActiveSheet()->getCell('A6')->setValue($objRichText);

            $evaluaciones = DB::table('tb_evaluation')
                ->join('tb_market', 'tb_evaluation.id_market', '=', 'tb_market.id_market')
                ->where('tb_evaluation.date','>=',$fechaIni)
                ->where('tb_evaluation.date','<=',$fechaFin)
                ->where('tb_market.group_type','=',$group_typeMarket)
                ->groupby('tb_evaluation.id_evaluation')
                ->orderby('tb_market.num_market')
                ->get();

            /*echo "<pre>";
            print_r($evaluaciones);
            echo "<pre>";die;*/

            $arrEvalColunas = [];
            $letras=strtoupper("abcdefghyjklmnñopqrstuvwxyz");
            //echo $letras[0];die;
            $col = 1;
            foreach($evaluaciones as $eval)
            {
                $columna = $letras[$col];
                $arrEvalColunas["id_".$eval->id_evaluation] = $letras[$col];
                $arrEvalColunas['ultima_columna'] = $letras[$col];
                $objPHPExcel ->getActiveSheet()->getColumnDimension($columna)->setWidth(17);
                $objPHPExcel->getActiveSheet()->getStyle($columna."2")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFFF99');
                //Pinto el nombre market 3
                $objPHPExcel->getActiveSheet()->getStyle($columna."3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('DD0806');
                $objPHPExcel->getActiveSheet()->getStyle($columna."3")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objRichText = new PHPExcel_RichText();
                $objRichText->createTextRun($eval->num_market)->getFont()->setBold(true)->setName('Arial')->setSize(10);
                $objPHPExcel->getActiveSheet()->getCell($columna."3")->setValue($objRichText);
                //Pinto fecha 4
                $fechaHora_eval = new DateTime($eval->date." ".$eval->time);
                $objPHPExcel->getActiveSheet()->getStyle($columna."4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('CCFFFF');
                $objPHPExcel->getActiveSheet()->getStyle($columna."4")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objRichText = new PHPExcel_RichText();
                $objRichText->createTextRun($fechaHora_eval->format('m/d/Y'))->getFont()->setBold(true)->setName('Arial')->setSize(10);
                $objPHPExcel->getActiveSheet()->getCell($columna."4")->setValue($objRichText);
                //Pinto Shopper 5
                $objPHPExcel->getActiveSheet()->getStyle($columna."5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFCC99');
                //Pinto Time 6
                $objPHPExcel->getActiveSheet()->getStyle($columna."6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('CCFFFF');
                $objPHPExcel->getActiveSheet()->getStyle($columna."6")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objRichText = new PHPExcel_RichText();
                $objRichText->createTextRun($fechaHora_eval->format('g:i A'))->getFont()->setBold(true)->setName('Arial')->setSize(10);
                $objPHPExcel->getActiveSheet()->getCell($columna."6")->setValue($objRichText);
                $col++;
            }




            //Indicadores del Market con sus evaluaciones
            $indicadoresMarket = DB::table('tb_indicator')
                ->join('tb_evaluation_market_indicator', 'tb_indicator.id_indicator', '=', 'tb_evaluation_market_indicator.id_indicator')
                ->join('tb_evaluation', 'tb_evaluation_market_indicator.id_evaluation', '=', 'tb_evaluation.id_evaluation')
                ->join('tb_market', 'tb_evaluation_market_indicator.id_market', '=', 'tb_market.id_market')
                ->where('tb_evaluation.date','>=',$fechaIni)
                ->where('tb_evaluation.date','<=',$fechaFin)
                ->where('tb_market.group_type','=',$group_typeMarket)
                ->orderby('tb_indicator.id_indicator')
                ->groupby('tb_indicator.name')
                ->get();
            $filaApintar = 7;
            foreach($indicadoresMarket as $indicMarket)
            {
                $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar:".$arrEvalColunas['ultima_columna'].$filaApintar)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FFCC99');
                $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar:A".($filaApintar+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                $objRichText = new PHPExcel_RichText();
                $objRichText->createTextRun($indicMarket->name)->getFont()->setBold(true)->setName('Arial')->setSize(10);
                $objPHPExcel->getActiveSheet()->getCell("A$filaApintar")->setValue($objRichText);
                $objPHPExcel->getActiveSheet()->getCell("A".($filaApintar+1))->setValue($indicMarket->description);
                //Busco todas las evaluacones de ese indicador
                $evalIndicatorMarket = DB::table('tb_evaluation_market_indicator')
                    ->join('tb_indicator', 'tb_evaluation_market_indicator.id_indicator', '=', 'tb_indicator.id_indicator')
                    ->join('tb_evaluation', 'tb_evaluation_market_indicator.id_evaluation', '=', 'tb_evaluation.id_evaluation')
                    ->join('tb_market', 'tb_evaluation_market_indicator.id_market', '=', 'tb_market.id_market')
                    ->where('tb_evaluation.date','>=',$fechaIni)
                    ->where('tb_evaluation.date','<=',$fechaFin)
                    ->where('tb_market.group_type','=',$group_typeMarket)
                    ->where('tb_indicator.name','=',$indicMarket->name)
                    ->orderby('tb_indicator.id_indicator')
                    ->orderby('tb_market.num_market')
                    ->get();
                foreach($evalIndicatorMarket as $eval)
                {
                    $columna_Apintar = $arrEvalColunas["id_".$eval->id_evaluation];
                    $objPHPExcel->getActiveSheet()->getStyle($columna_Apintar.($filaApintar+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $objPHPExcel->getActiveSheet()->getCell($columna_Apintar.($filaApintar+1))->setValue($eval->points);
                }
                $filaApintar+=2;
            }


            //Pinar los datos de departamentos
            $Departaments_evaluados = DB::table('tb_evaluation')
                ->join('tb_evaluation_departament_indicator', 'tb_evaluation.id_evaluation', '=', 'tb_evaluation_departament_indicator.id_evaluation')
                ->join('tb_departament', 'tb_evaluation_departament_indicator.id_dpto', '=', 'tb_departament.id_dpto')
                ->join('tb_market', 'tb_departament.id_market', '=', 'tb_market.id_market')
                ->where('tb_evaluation.date','>=',$fechaIni)
                ->where('tb_evaluation.date','<=',$fechaFin)
                ->where('tb_market.group_type','=',$group_typeMarket)
                ->groupby('tb_departament.name')
                ->orderby('tb_departament.name')
                //->select(array('tb_indicator.*','tb_evaluation_departament_indicator.*','tb_evaluation.*','tb_departament.*','tb_market.*','tb_departament.name as name_departament', 'tb_indicator.name as name_indicator'))
                ->get();

            /*echo "<pre>";
            print_r($Departaments_evaluados);
            echo "<pre>";die;*/

            //$filaPintando = $filaIndicador;
            $departamento_nombre = "";
            foreach($Departaments_evaluados as $key=>$departament_eval)
            {
                $ultimaColumna = $arrEvalColunas['ultima_columna'];
                $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar:$ultimaColumna".$filaApintar)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('DD0806');
                $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar:$ultimaColumna".$filaApintar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                $objRichText = new PHPExcel_RichText();
                $objRichText->createTextRun("Step ".($key+1).".   ".$departament_eval->name)->getFont()->setBold(true)->setName('Arial')->setSize(10);
                $objPHPExcel->getActiveSheet()->getCell("A$filaApintar")->setValue($objRichText);
                $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar:$ultimaColumna".$filaApintar)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('DD0806');
                $filaApintar++;
                $objPHPExcel -> getActiveSheet()->getRowDimension($filaApintar)->setRowHeight(28);
                $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar:$ultimaColumna".$filaApintar)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('FCF305');
                $objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_BOTTOM);
                $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                $objRichText = new PHPExcel_RichText();
                $objRichText->createTextRun("Employee Name:")->getFont()->setBold(true)->setName('Arial')->setSize(10);
                $objPHPExcel->getActiveSheet()->getCell("A$filaApintar")->setValue($objRichText);
                $evaluaciones_deprtamento = DB::table('tb_indicator')
                    ->join('tb_evaluation_departament_indicator', 'tb_indicator.id_indicator', '=', 'tb_evaluation_departament_indicator.id_indicator')
                    ->join('tb_departament', 'tb_evaluation_departament_indicator.id_dpto', '=', 'tb_departament.id_dpto')
                    ->join('tb_evaluation', 'tb_evaluation_departament_indicator.id_evaluation', '=', 'tb_evaluation.id_evaluation')
                    ->join('tb_market', 'tb_departament.id_market', '=', 'tb_market.id_market')
                    ->where('tb_evaluation.date','>=',$fechaIni)
                    ->where('tb_evaluation.date','<=',$fechaFin)
                    ->where('tb_market.group_type','=',$group_typeMarket)
                    ->where('tb_departament.name','=',$departament_eval->name)
                    ->orderby('tb_indicator.id_indicator')
                    ->select(array('tb_indicator.*','tb_evaluation_departament_indicator.*','tb_evaluation.*','tb_departament.*','tb_market.*','tb_departament.name as name_departament', 'tb_indicator.name as name_indicator'))
                    ->get();
                $filaApintar++;
                //aqui va los datos de ese departamento
                $indicador_aux = "";
                $fila_name_empleado = $filaApintar-1;
                $fila_inicio_indicadores = $filaApintar;
                $cant_indicadores = 0;
                foreach($evaluaciones_deprtamento as $eval)
                {
                    $columna_eval = $arrEvalColunas["id_".$eval->id_evaluation];
                    if($indicador_aux <> $eval->name_indicator)
                    {
                        $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                        $objPHPExcel->getActiveSheet()->getCell("A$filaApintar")->setValue($eval->name_indicator);
                        $indicador_aux = $eval->name_indicator;
                        $cant_indicadores++;
                    }
                    else
                        $filaApintar--;
                    //nombre de empleado
                    $objPHPExcel->getActiveSheet()->getStyle($columna_eval.$fila_name_empleado)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $objPHPExcel->getActiveSheet()->getCell($columna_eval.$fila_name_empleado)->setValue($eval->employee_name);
                    //Point
                    $objPHPExcel->getActiveSheet()->getStyle($columna_eval.$filaApintar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $objPHPExcel->getActiveSheet()->getCell($columna_eval.$filaApintar)->setValue($eval->points);

                    $objPHPExcel -> getActiveSheet()->setCellValue($columna_eval.($filaApintar+1),'= SUMA('.$columna_eval.$fila_inicio_indicadores.':'.$columna_eval.($filaApintar).')/'.$cant_indicadores);
                    $filaApintar++;
                }
                $objPHPExcel->getActiveSheet()->getStyle("A".$filaApintar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                $objPHPExcel->getActiveSheet()->getCell("A".$filaApintar)->setValue("Associate / Department Score:");
                $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar:$ultimaColumna".$filaApintar)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('c0bbbb');
                $filaApintar++;
            }



            $objDrawing = new PHPExcel_Worksheet_Drawing();
            $objDrawing -> setName('Logo');
            $objDrawing -> setDescription('Logo');
            $objDrawing -> setPath(public_path().'/assets/proyecto/excel/logo_excel.jpg');
            $objDrawing -> setHeight(70);
            $objDrawing -> setCoordinates('A'.($filaApintar+1));
            $objDrawing -> setWorksheet($objPHPExcel->getActiveSheet());




            $dateIni = new DateTime($fechaIni);
            $dateFin = new DateTime($fechaIni);
            if($dateIni->format('n') == $dateFin->format('n'))
            {
                $file_name = "Group $group_typeMarket Stores - ".$dateIni->format('F Y');
            }
            else
                $file_name = "Group $group_typeMarket Stores - (".$dateIni->format('m/d/Y')." a ".$dateFin->format('m/d/Y');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$file_name.'.xlsx"');
            header('Cache-Control: max-age=0');
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->save('php://output');
            exit;
        }
        return View::make("report.report");
    }

    public function reportChart()
    {
        if(Input::server("REQUEST_METHOD") == "POST")
        {

            $fechaIni = Input::get("fechaIni");
            $fechaFin = Input::get("fechaFin");
            //echo $fechaIni."  ".$fechaFin;die;
            $group_typeMarket = Input::get("group_type");
            //$fechaIni = '2017-04-01';
            //$fechaFin = '2017-04-31';
            //$group_typeMarket = "A";
            require(app_path() . "/lib/PHPExcel/Classes/PHPExcel.php");
            $objPHPExcel = new PHPExcel();
            //Propiedades
            $data=[['15',93.89],['7',93.3],['10',92.61],['5',91.02],['21',90.93],['17',88.05],['20',87.93],['23',87.3],['4',85.06]];
            $objPHPExcel->getProperties()
                ->setCreator("MysteryShop")
                ->setLastModifiedBy("MysteryShop")
                ->setTitle("Reporte x mes")
                ->setSubject("...")
                ->setDescription("...")
                ->setKeywords("...")
                ->setCategory("...");
            //ponemos activa la hoja en que se trabajara
            $objPHPExcel->getActiveSheetIndex(0);
            //Nombre de la primera hoja
            $objPHPExcel->getActiveSheet()->setTitle("Reporte");
            $objPHPExcel->getActiveSheet()->setCellValue('a1', 'Store'); // Sets cell 'a1' to value 'ID
            $objPHPExcel->getActiveSheet()->setCellValue('b1', 'Average');
            $objPHPExcel->getActiveSheet()->fromArray($data, ' ', 'A2');
            $dsl=array(
                new \PHPExcel_Chart_DataSeriesValues('String', 'Reporte!$B$1', NULL, 1),
            );
            $xal=array(
                new \PHPExcel_Chart_DataSeriesValues('String', 'Reporte!$A$2:$A$10', NULL, 90),
            );
            $dsv=array(
                new \PHPExcel_Chart_DataSeriesValues('Number', 'Reporte!$B$2:$B$10', NULL, 90),

            );
            $ds=new \PHPExcel_Chart_DataSeries(
                \PHPExcel_Chart_DataSeries::TYPE_BARCHART,
                \PHPExcel_Chart_DataSeries::GROUPING_STANDARD,
                range(0, count($dsv)-1),
                $dsl,
                $xal,
                $dsv
            );
            $title=new \PHPExcel_Chart_Title('Any literal string');
            $pa=new \PHPExcel_Chart_PlotArea(NULL, array($ds));
            $layoout=new \PHPExcel_Chart_Layout();
            $layoout->setShowCatName(true);
            //$legend=new \PHPExcel_Chart_GridLines(\PHPExcel_Chart_GridLines::Colo, NULL, false);
            $chart= new \PHPExcel_Chart(
                'chart1',
                $title,
                null, //$legend,
                $pa,
                true,
                0,
                NULL,
                NULL
            );
            $chart->setTopLeftPosition('G1');//define donnde comienza
            $chart->setBottomRightPosition('R15');//define donde termina
            $objPHPExcel->getActiveSheet()->addChart($chart);
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="chart.xlsx"');
            header('Cache-Control: max-age=0');
            $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->setIncludeCharts(true);
            $objWriter->save('php://output');
            exit;
        }
        return View::make("report.report");
    }

    public function reportGroupPorFecha()
    {
        if(Input::server("REQUEST_METHOD") == "POST") {
            $fechaIni = Input::get("fechaIni");
            $fechaFin = Input::get("fechaFin");
            //echo $fechaIni."  ".$fechaFin;die;
            $group_typeMarket = Input::get("group_type");
            //$fechaIni = '2017-04-01';
            //$fechaFin = '2017-04-31';
            //$group_typeMarket = "A";
            require(app_path() . "/lib/PHPExcel/Classes/PHPExcel.php");


            $objPHPExcel = new PHPExcel();
            //Propiedades
            $objPHPExcel->getProperties()
                ->setCreator("MysteryShop")
                ->setLastModifiedBy("MysteryShop")
                ->setTitle("Reporte x mes")
                ->setSubject("...")
                ->setDescription("...")
                ->setKeywords("...")
                ->setCategory("...");
            //ponemos activa la hoja en que se trabajara
            $objPHPExcel->getActiveSheetIndex(0);
            //Nombre de la primera hoja
            $objPHPExcel->getActiveSheet()->setTitle("Reporte");
            //Zoom
            //$objPHPExcel -> getActiveSheet() - > getSheetView() -> setZoomScale(75);
            //la fuente predeterminada
            $objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
            $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
            //Ancho de la primera columna
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(114);
            //Imagen
            $objDrawing = new PHPExcel_Worksheet_Drawing();
            $objDrawing->setName('Logo');
            $objDrawing->setDescription('Logo');
            $objDrawing->setPath(public_path() . '/assets/proyecto/excel/logo_excel.jpg');
            $objDrawing->setHeight(70);
            $objDrawing->setCoordinates('A1');
            $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
            //tamaño de fila
            $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(53);
            $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(28);
            //color de fondo de una celda
            $objPHPExcel->getActiveSheet()->getStyle('A2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FFFF99');
            //Stilo de un texto;
            $objRichText = new PHPExcel_RichText();
            $texto = $objRichText->createTextRun('Customer Service Quality and Mystery Shop Report');
            $texto->getFont()
                ->setBold(true)
                ->setColor(new PHPExcel_Style_Color (PHPExcel_Style_Color::COLOR_BLACK))
                ->setSize(14)
                ->setName('Arial');
            $objRichText->createTextRun('                                                                                                                                       (Rating the following from 1-5:    5 = very satisfied  4 = satisfied  3 = average  2 = dissatisfied  1 = very dissatisfied)')->getFont()->setSize(8)->setName('Arial');
            $objPHPExcel->getActiveSheet()->getCell('A2')->setValue($objRichText);
            $objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setWrapText(true);
            //Alineacion del texto
            $objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
            //A3
            $objPHPExcel->getActiveSheet()->getStyle('A3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('DD0806');
            $objPHPExcel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objRichText = new PHPExcel_RichText();
            $objRichText->createTextRun('Store #:')->getFont()->setBold(true)->setName('Arial')->setSize(10);
            $objPHPExcel->getActiveSheet()->getCell('A3')->setValue($objRichText);
            //A4
            $objPHPExcel->getActiveSheet()->getStyle('A4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('CCFFFF');
            $objPHPExcel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objRichText = new PHPExcel_RichText();
            $objRichText->createTextRun('Date:')->getFont()->setBold(true)->setName('Arial')->setSize(10);
            $objPHPExcel->getActiveSheet()->getCell('A4')->setValue($objRichText);
            //A5
            $objPHPExcel->getActiveSheet()->getStyle('A5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FFCC99');
            $objPHPExcel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objRichText = new PHPExcel_RichText();
            $objRichText->createTextRun('Shopper:')->getFont()->setBold(true)->setName('Arial')->setSize(10);
            $objPHPExcel->getActiveSheet()->getCell('A5')->setValue($objRichText);
            //A6
            $objPHPExcel->getActiveSheet()->getStyle('A6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('CCFFFF');
            $objPHPExcel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objRichText = new PHPExcel_RichText();
            $objRichText->createTextRun('Time:')->getFont()->setBold(true)->setName('Arial')->setSize(10);
            $objPHPExcel->getActiveSheet()->getCell('A6')->setValue($objRichText);
            $filaApintar = 7;

            $arrCasillas= [];
            $arrCasillas = array_merge($arrCasillas, $this->pintarIndicadores($objPHPExcel,$fechaIni,$fechaFin,$group_typeMarket,$filaApintar));
            $filaApintar = $arrCasillas['filaApintar'];
            $arrCasillas = array_merge($arrCasillas,$this->pintarParametrosMedir($objPHPExcel,$filaApintar));
            $filaApintar = $arrCasillas['filaApintar'];
            $arrCasillas = array_merge($arrCasillas,$this->pintarDepartamenos($objPHPExcel,$fechaIni,$fechaFin,$group_typeMarket,$filaApintar));
            $filaApintar = $arrCasillas['filaApintar'];
            //echo "num-".$filaApintar;die;
            //print_r($arrCasillas);die;
            $objPHPExcel->getActiveSheet()->getRowDimension($filaApintar)->setRowHeight(20);
            //color de fondo de una celda
            $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FFFF99');
            $objRichText = new PHPExcel_RichText();
            $objRichText->createTextRun("Total Overall Performance of each shop")->getFont()->setBold(true)->setName('Arial')->setSize(10);
            $objPHPExcel->getActiveSheet()->getCell("A$filaApintar")->setValue($objRichText);
            $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getAlignment()->setWrapText(true);
            //Alineacion del texto
            $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $arrCasillas['total_overall']['filaApintar']=$filaApintar;
            $filaApintar++;



            $evaluaciones = DB::table('tb_evaluation')
                ->join('tb_market', 'tb_evaluation.id_market', '=', 'tb_market.id_market')
                ->where('tb_evaluation.date','>=',$fechaIni)
                ->where('tb_evaluation.date','<=',$fechaFin)
                ->where('tb_market.group_type','=',$group_typeMarket)
                ->groupby('tb_evaluation.id_evaluation')
                ->orderby('tb_market.num_market')
                ->get();
            $letras=strtoupper("abcdefghyjklmnñopqrstuvwxyz");
            foreach($evaluaciones as $key=>$eval)
            {
                $arrCasillas = array_merge($arrCasillas,$this->pintarColumnaEvaluacion($objPHPExcel,$arrCasillas,$eval,$letras[$key+1]));
            }


            $objDrawing = new PHPExcel_Worksheet_Drawing();
            $objDrawing -> setName('Logo');
            $objDrawing -> setDescription('Logo');
            $objDrawing -> setPath(public_path().'/assets/proyecto/excel/logo_excel.jpg');
            $objDrawing -> setHeight(70);
            $objDrawing -> setCoordinates('A'.($filaApintar+1));
            $objDrawing -> setWorksheet($objPHPExcel->getActiveSheet());

            $dateIni = new DateTime($fechaIni);
            $dateFin = new DateTime($fechaIni);
            if($dateIni->format('n') == $dateFin->format('n'))
            {
                $file_name = "Group $group_typeMarket Stores - ".$dateIni->format('F Y');
                $name_graph = "Group $group_typeMarket Mystery Shop Scores - ".$dateIni->format('F Y');
            }
            else
            {
                $file_name = "Group $group_typeMarket Stores - (".$dateIni->format('m/d/Y')." a ".$dateFin->format('m/d/Y').")";
                $name_graph = "Group $group_typeMarket Mystery Shop Scores - (".$dateIni->format('m/d/Y')." a ".$dateFin->format('m/d/Y').")";
            }

            $this->grafica($objPHPExcel,$name_graph,$arrCasillas['total_overall']['promedios']);
            $objPHPExcel->setActiveSheetIndex(0);

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$file_name.'.xlsx"');
            header('Cache-Control: max-age=0');
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->setIncludeCharts(true);
            $objWriter->save('php://output');
            exit;
        }
        return View::make("report.report");
    }

    private function pintarIndicadores($objPHPExcel,$fechaIni,$fechaFin,$group_typeMarket,$filaApintar)
    {
        $arrCasillas= ['filaApintar'=>$filaApintar];
        $indicadoresMarket = DB::table('tb_indicator')
            ->join('tb_evaluation_market_indicator', 'tb_indicator.id_indicator', '=', 'tb_evaluation_market_indicator.id_indicator')
            ->join('tb_evaluation', 'tb_evaluation_market_indicator.id_evaluation', '=', 'tb_evaluation.id_evaluation')
            ->join('tb_market', 'tb_evaluation_market_indicator.id_market', '=', 'tb_market.id_market')
            ->where('tb_evaluation.date','>=',$fechaIni)
            ->where('tb_evaluation.date','<=',$fechaFin)
            ->where('tb_market.group_type','=',$group_typeMarket)
            ->orderby('tb_indicator.id_indicator')
            ->groupby('tb_indicator.name')
            ->select(array('tb_indicator.*','tb_evaluation_market_indicator.*','tb_evaluation.*','tb_market.*','tb_indicator.description as description_indicator'))
            ->get();
        foreach($indicadoresMarket as $indic)
        {
            $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FFCC99');
            $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar:A".($filaApintar+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $objRichText = new PHPExcel_RichText();
            $objRichText->createTextRun($indic->name)->getFont()->setBold(true)->setName('Arial')->setSize(10);
            $objPHPExcel->getActiveSheet()->getCell("A$filaApintar")->setValue($objRichText);
            $objPHPExcel->getActiveSheet()->getCell("A".($filaApintar+1))->setValue("(".$indic->description_indicator.")");
            $arrCasillas['store_ind'.$indic->id_indicator]=$filaApintar+1;
            $filaApintar+=2;
        }
        $arrCasillas['filaApintar']=$filaApintar;
        return $arrCasillas;
    }

    private function pintarParametrosMedir($objPHPExcel,$filaApintar)
    {
        $arrCasillas= ['filaApintar'=>$filaApintar];
        $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFCC99');
        $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar:A".($filaApintar+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $objRichText = new PHPExcel_RichText();
        $objRichText->createTextRun("Overall Customer Acknowledgement")->getFont()->setBold(true)->setName('Arial')->setSize(10);
        $objPHPExcel->getActiveSheet()->getCell("A$filaApintar")->setValue($objRichText);
        $objPHPExcel->getActiveSheet()->getCell("A".($filaApintar+1))->setValue("Staff was greeting and acknowledging the customers.");
        $arrCasillas['store_parametros_medir']=array(['fila'=>($filaApintar+1),'id_indicator_promedio'=>6]);
        $filaApintar+=2;
        $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFCC99');
        $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar:A".($filaApintar+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $objRichText = new PHPExcel_RichText();
        $objRichText->createTextRun("Overall Employee Appearance")->getFont()->setBold(true)->setName('Arial')->setSize(10);
        $objPHPExcel->getActiveSheet()->getCell("A$filaApintar")->setValue($objRichText);
        $objPHPExcel->getActiveSheet()->getCell("A".($filaApintar+1))->setValue("Employee was in proper uniform and name tag visible");
        $arrCasillas['store_parametros_medir']=array(['fila'=>($filaApintar+1),'id_indicator_promedio'=>4]);
        $arrCasillas['filaApintar']=$filaApintar+2;
        return $arrCasillas;
    }

    private function pintarDepartamenos($objPHPExcel,$fechaIni,$fechaFin,$group_typeMarket,$filaApintar)
    {
        $arrCasillas= ['filaApintar'=>$filaApintar];
       $todos_departamentos_evauados = DB::table('tb_departament')
           ->join('tb_evaluation_departament_indicator', 'tb_departament.id_dpto', '=', 'tb_evaluation_departament_indicator.id_dpto')
           ->join('tb_evaluation', 'tb_evaluation_departament_indicator.id_evaluation', '=', 'tb_evaluation.id_evaluation')
           ->join('tb_market', 'tb_departament.id_market', '=', 'tb_market.id_market')
           ->where('tb_evaluation.date','>=',$fechaIni)
           ->where('tb_evaluation.date','<=',$fechaFin)
           ->where('tb_departament.name','<>','Manager')
           ->where('tb_market.group_type','=',$group_typeMarket)
           ->groupby('tb_departament.name')
           ->orderby('tb_departament.name')
           //->select(array('tb_indicator.*','tb_evaluation_departament_indicator.*','tb_evaluation.*','tb_departament.*','tb_market.*','tb_departament.name as name_departament', 'tb_indicator.name as name_indicator'))
           ->get();
        foreach($todos_departamentos_evauados as $key=>$depart)
        {
            $arrCasillas['dpto_name_'.$depart->name] = [];
            $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('DD0806');
            $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $objRichText = new PHPExcel_RichText();
            $objRichText->createTextRun("Step ".($key+1).".   ".$depart->name)->getFont()->setBold(true)->setName('Arial')->setSize(10);
            $objPHPExcel->getActiveSheet()->getCell("A$filaApintar")->setValue($objRichText);
            $arrCasillas['dpto_name_'.$depart->name]['filaApintar']=$filaApintar;
            $filaApintar++;
            $objPHPExcel -> getActiveSheet()->getRowDimension($filaApintar)->setRowHeight(28);
            $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FCF305');
            $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objRichText = new PHPExcel_RichText();
            $objRichText->createTextRun("Employee Name:")->getFont()->setBold(true)->setName('Arial')->setSize(10);
            $objPHPExcel->getActiveSheet()->getCell("A$filaApintar")->setValue($objRichText);
            $filaApintar++;
            $indicadores_departamento_evaluados = DB::table('tb_indicator')
                ->join('tb_evaluation_departament_indicator', 'tb_indicator.id_indicator', '=', 'tb_evaluation_departament_indicator.id_indicator')
                ->join('tb_departament', 'tb_evaluation_departament_indicator.id_dpto', '=', 'tb_departament.id_dpto')
                ->join('tb_evaluation', 'tb_evaluation_departament_indicator.id_evaluation', '=', 'tb_evaluation.id_evaluation')
                ->join('tb_market', 'tb_departament.id_market', '=', 'tb_market.id_market')
                ->where('tb_evaluation.date','>=',$fechaIni)
                ->where('tb_evaluation.date','<=',$fechaFin)
                ->where('tb_market.group_type','=',$group_typeMarket)
                ->where('tb_departament.name','=',$depart->name)
                ->orderby('tb_indicator.id_indicator')
                ->groupby('tb_indicator.id_indicator')
                ->select(array('tb_indicator.*','tb_evaluation_departament_indicator.*','tb_evaluation.*','tb_departament.*','tb_market.*','tb_departament.name as name_departament', 'tb_indicator.name as name_indicator','tb_indicator.description as description_indicator'))
                ->get();
            $arrCasillas['dpto_name_'.$depart->name]['num_indic']=0;
            foreach($indicadores_departamento_evaluados as $key=>$indic)
            {
                $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                $objPHPExcel->getActiveSheet()->getCell("A$filaApintar")->setValue(($key+1).". ".$indic->name_indicator." (".$indic->description_indicator.")");
                $arrCasillas['dpto_name_'.$depart->name]['indic_id_'.$indic->id_indicator]=$filaApintar;
                $filaApintar++;
                $arrCasillas['dpto_name_'.$depart->name]['num_indic']++;
            }
            $objPHPExcel->getActiveSheet()->getStyle("A".$filaApintar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objRichText = new PHPExcel_RichText();
            $objRichText->createTextRun("Associate / Department Score:")->getFont()->setBold(true)->setName('Arial')->setSize(10);
            $objPHPExcel->getActiveSheet()->getCell("A".$filaApintar)->setValue($objRichText);
            $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('c0bbbb');
            $arrCasillas['dpto_name_'.$depart->name]['Score']=$filaApintar;
            $filaApintar++;
        }
        $filaApintar+=2;
        $arrCasillas['dpto_name_Manager'] = [];
        $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('DD0806');
        $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $objRichText = new PHPExcel_RichText();
        $objRichText->createTextRun("Step ".($key+3).".   Manager")->getFont()->setBold(true)->setName('Arial')->setSize(10);
        $objPHPExcel->getActiveSheet()->getCell("A$filaApintar")->setValue($objRichText);
        $arrCasillas['dpto_name_Manager']['filaApintar']=$filaApintar;
        $filaApintar++;
        $objPHPExcel -> getActiveSheet()->getRowDimension($filaApintar)->setRowHeight(28);
        $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FCF305');
        $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objRichText = new PHPExcel_RichText();
        $objRichText->createTextRun("Employee Name:")->getFont()->setBold(true)->setName('Arial')->setSize(10);
        $objPHPExcel->getActiveSheet()->getCell("A$filaApintar")->setValue($objRichText);
        $filaApintar++;
        $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FCF305');
        $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objRichText = new PHPExcel_RichText();
        $objRichText->createTextRun('Date:')->getFont()->setBold(true)->setName('Arial')->setSize(10);
        $objPHPExcel->getActiveSheet()->getCell("A$filaApintar")->setValue($objRichText);
        $filaApintar++;
        $indicadores_departamentoManager_evaluados = DB::table('tb_indicator')
            ->join('tb_evaluation_departament_indicator', 'tb_indicator.id_indicator', '=', 'tb_evaluation_departament_indicator.id_indicator')
            ->join('tb_departament', 'tb_evaluation_departament_indicator.id_dpto', '=', 'tb_departament.id_dpto')
            ->join('tb_evaluation', 'tb_evaluation_departament_indicator.id_evaluation', '=', 'tb_evaluation.id_evaluation')
            ->join('tb_market', 'tb_departament.id_market', '=', 'tb_market.id_market')
            ->where('tb_evaluation.date','>=',$fechaIni)
            ->where('tb_evaluation.date','<=',$fechaFin)
            ->where('tb_market.group_type','=',$group_typeMarket)
            ->where('tb_departament.name','=','Manager')
            ->orderby('tb_indicator.id_indicator')
            ->groupby('tb_indicator.id_indicator')
            ->select(array('tb_indicator.*','tb_evaluation_departament_indicator.*','tb_evaluation.*','tb_departament.*','tb_market.*','tb_departament.name as name_departament', 'tb_indicator.name as name_indicator','tb_indicator.description as description_indicator'))
            ->get();
        $arrCasillas['dpto_name_Manager']['num_indic']=0;
        foreach($indicadores_departamentoManager_evaluados as $key=>$indic)
        {
            $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $objPHPExcel->getActiveSheet()->getCell("A$filaApintar")->setValue(($key+1).". ".$indic->name_indicator." (".$indic->description_indicator.")");
            $arrCasillas['dpto_name_Manager']['indic_id_'.$indic->id_indicator]=$filaApintar;
            $filaApintar++;
            $arrCasillas['dpto_name_Manager']['num_indic']++;
        }
        $objPHPExcel->getActiveSheet()->getStyle("A".$filaApintar)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objRichText = new PHPExcel_RichText();
        $objRichText->createTextRun("Associate / Department Score:")->getFont()->setBold(true)->setName('Arial')->setSize(10);
        $objPHPExcel->getActiveSheet()->getCell("A".$filaApintar)->setValue($objRichText);
        $objPHPExcel->getActiveSheet()->getStyle("A$filaApintar")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('c0bbbb');
        $arrCasillas['dpto_name_Manager']['Score']=$filaApintar;
        $filaApintar++;

        $arrCasillas['filaApintar']=$filaApintar;
        return $arrCasillas;

    }



    private function pintarColumnaEvaluacion($objPHPExcel,$arrCasillas,$evaluacion,$col)
    {
        $arrCasillas['total_overall']['promedios']=[];
        //tamaño de la columna
        $objPHPExcel ->getActiveSheet()->getColumnDimension($col)->setWidth(17);
        //centro el contenido de la columna
        $objPHPExcel->getActiveSheet()->getStyle($col."1:".$col."500")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
       //Fila 2
        $objPHPExcel->getActiveSheet()->getStyle($col."2")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFFF99');
        //Fila 3 Store #
        $objPHPExcel->getActiveSheet()->getStyle($col."3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('DD0806');
        $objRichText = new PHPExcel_RichText();
        $objRichText->createTextRun($evaluacion->num_market)->getFont()->setBold(true)->setName('Arial')->setSize(10);
        $objPHPExcel->getActiveSheet()->getCell($col."3")->setValue($objRichText);
        //Fila 4 fecha
        $fechaHora_eval = new DateTime($evaluacion->date." ".$evaluacion->time);
        $objPHPExcel->getActiveSheet()->getStyle($col."4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('CCFFFF');
        $objRichText = new PHPExcel_RichText();
        $objRichText->createTextRun($fechaHora_eval->format('m/d/Y'))->getFont()->setBold(true)->setName('Arial')->setSize(10);
        $objPHPExcel->getActiveSheet()->getCell($col."4")->setValue($objRichText);
        //Fila 5
        $objPHPExcel->getActiveSheet()->getStyle($col."5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFCC99');
        //Pinto Time 6
        $objPHPExcel->getActiveSheet()->getStyle($col."6")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('CCFFFF');
        $objRichText = new PHPExcel_RichText();
        $objRichText->createTextRun($fechaHora_eval->format('g:i A'))->getFont()->setBold(true)->setName('Arial')->setSize(10);
        $objPHPExcel->getActiveSheet()->getCell($col."6")->setValue($objRichText);

        $indic_evaluados_market = DB::table('tb_evaluation_market_indicator')
            ->where('tb_evaluation_market_indicator.id_evaluation','=',$evaluacion->id_evaluation)
            ->where('tb_evaluation_market_indicator.id_market','<=',$evaluacion->id_market)
            ->orderby('tb_evaluation_market_indicator.id_indicator')
            ->get();
        foreach($indic_evaluados_market as $indic)
        {
           $fila = $arrCasillas['store_ind'.$indic->id_indicator];
            $objPHPExcel->getActiveSheet()->getStyle($col.($fila-1))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('FFCC99');
            $objPHPExcel->getActiveSheet()->getCell($col.$fila)->setValue($indic->points);
        }
        $departamentos_evaluados = DB::table('tb_evaluation_departament_indicator')
            ->join('tb_departament', 'tb_departament.id_dpto', '=', 'tb_evaluation_departament_indicator.id_dpto')
            ->where('tb_evaluation_departament_indicator.id_evaluation','=',$evaluacion->id_evaluation)
            ->groupBy('tb_evaluation_departament_indicator.id_dpto')
            ->orderby('tb_evaluation_departament_indicator.employee_name')
            ->get();
        $arrNombresPremiados = [];
        for($i=0;$i<count($departamentos_evaluados)-1;$i++)
        {
            if($departamentos_evaluados[$i]->employee_name !="" && $departamentos_evaluados[$i]->employee_name == $departamentos_evaluados[$i+1]->employee_name && !in_array($departamentos_evaluados[$i]->employee_name,$arrNombresPremiados))
            {
                $arrNombresPremiados[]=$departamentos_evaluados[$i]->employee_name;
            }
        }

        //Pintar por departamento
        $departamentos_evaluados = DB::table('tb_evaluation_departament_indicator')
            ->join('tb_departament', 'tb_departament.id_dpto', '=', 'tb_evaluation_departament_indicator.id_dpto')
            ->where('tb_evaluation_departament_indicator.id_evaluation','=',$evaluacion->id_evaluation)
            ->groupBy('tb_evaluation_departament_indicator.id_dpto')
            ->orderby('tb_evaluation_departament_indicator.id_dpto')
            ->get();
        $promedio_market = ['suma'=>0,'cant'=>0];
        foreach($departamentos_evaluados as $dept)
        {
            $datos_departamento = $arrCasillas['dpto_name_'.$dept->name];
            //print_r($datos_departamento);die;
            $objPHPExcel->getActiveSheet()->getStyle($col.$datos_departamento['filaApintar'])->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('DD0806');
            //Nombre del empleado
            $color = 'FCF305';
            if(in_array($dept->employee_name,$arrNombresPremiados))
            {
                $color = 'B1A0C7';
            }
            $objPHPExcel->getActiveSheet()->getStyle($col.($datos_departamento['filaApintar']+1))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB($color);
            $objPHPExcel->getActiveSheet()->getStyle($col.($datos_departamento['filaApintar']+1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getCell($col.($datos_departamento['filaApintar']+1))->setValue($dept->employee_name);
            //Puntos de los indcadores del departamento
            $indicadores_departamentos = DB::table('tb_evaluation_departament_indicator')
                ->join('tb_indicator', 'tb_indicator.id_indicator', '=', 'tb_evaluation_departament_indicator.id_indicator')
                ->where('tb_evaluation_departament_indicator.id_evaluation','=',$evaluacion->id_evaluation)
                ->where('tb_evaluation_departament_indicator.id_dpto','=',$dept->id_dpto)
                ->orderby('tb_evaluation_departament_indicator.id_indicator')
                ->get();
            $promedio_departamento = ['suma'=>0,'cantidad'=>0,'valido'=>true];
           foreach($indicadores_departamentos as $indic_dpto)
           {
               if($indic_dpto->points != 0)
               {
                   $promedio_departamento['suma'] = $promedio_departamento['suma']+$indic_dpto->points;
                   $promedio_departamento['cantidad']++;
                   $objPHPExcel->getActiveSheet()->getStyle($col.$datos_departamento['indic_id_'.$indic_dpto->id_indicator])->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                   $objPHPExcel->getActiveSheet()->getCell($col.$datos_departamento['indic_id_'.$indic_dpto->id_indicator])->setValue($indic_dpto->points);
               }
               else
               {
                   $promedio_departamento['valido']=false;
               }

           }
            /*print_r($datos_departamento);
            print_r($indicadores_departamentos);die;*/
           $total = 0;
           if($promedio_departamento['valido'])
           {
               $total = round( $promedio_departamento['suma']/$promedio_departamento['cantidad'], 2);
           }
           if($dept->name != "Manager" && $total!=0)
           {
               $promedio_market['suma']+=$total;
               $promedio_market['cant']++;
           }
            $objPHPExcel->getActiveSheet()->getStyle($col.$datos_departamento['Score'])->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
            $objPHPExcel->getActiveSheet()->getCell($col.$datos_departamento['Score'])->setValue($total);
            $objPHPExcel->getActiveSheet()->getStyle($col.$datos_departamento['Score'])->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('c0bbbb');
        }
        $objPHPExcel->getActiveSheet()->getStyle($col.$arrCasillas['total_overall']['filaApintar'])->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('FFFF99');
        $promedioMar = round( $promedio_market['suma']/$promedio_market['cant'], 2);
        $objPHPExcel->getActiveSheet()->getCell($col.$arrCasillas['total_overall']['filaApintar'])->setValue($promedioMar);
        $objPHPExcel->getActiveSheet()->getStyle($col.$arrCasillas['total_overall']['filaApintar'])->getAlignment()->setWrapText(true);
        //Alineacion del texto
        $objPHPExcel->getActiveSheet()->getStyle($col.$arrCasillas['total_overall']['filaApintar'])->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $arrCasillas['total_overall']['promedios'][]=['evaluacion'=>$evaluacion,'promedio'=>$promedioMar];
        return $arrCasillas;
    }

    private function grafica($objPHPExcel,$file_name,$arr_promedios)
    {
        for($i=0;$i<count($arr_promedios)-1;$i++)
        {
            for($j=$i+1;$j<count($arr_promedios);$j++)
            {
                if($arr_promedios[$i]['promedio']<$arr_promedios[$j]['promedio'])
                {
                    $pivote= $arr_promedios[$i];
                    $arr_promedios[$i] = $arr_promedios[$j];
                    $arr_promedios[$j] = $pivote;
                }
            }
        }
        $data = [];
        $cant = 0;
        foreach($arr_promedios as $dato)
        {
            $data[]=[$dato['evaluacion']->num_market,$dato['promedio']*20];
            $cant++;
        }

        // Crear una nueva hoja de cálculo llamado "Mis datos"
        $myWorkSheet = new PHPExcel_Worksheet ($objPHPExcel, 'Graph');
        // Coloque la hoja de cálculo "Mis datos" como la primera hoja del objeto PHPExcel
        $objPHPExcel -> addSheet ($myWorkSheet, 1);

        //$data=[['15',93.89],['7',93.3],['10',92.61],['5',91.02],['21',90.93],['17',88.05],['20',87.93],['23',87.3],['4',85.06]];
        //ponemos activa la hoja en que se trabajara
        $objPHPExcel ->setActiveSheetIndexByName ('Graph');
        //Nombre de la primera hoja
        //$objPHPExcel->getActiveSheet()->setTitle("Graph");
        $objPHPExcel->getActiveSheet()->setCellValue('a1', 'Store'); // Sets cell 'a1' to value 'ID
        $objPHPExcel->getActiveSheet()->setCellValue('b1', 'Ave %');
        $objPHPExcel->getActiveSheet()->fromArray($data, ' ', 'A2');
        $dsl=array(
            new \PHPExcel_Chart_DataSeriesValues('String', 'Graph!$B$1', NULL, 1),
        );
        $xal=array(
            new \PHPExcel_Chart_DataSeriesValues('String', 'Graph!$A$2:$A$'.($cant+1), NULL, 90),
        );
        $dsv=array(
            new \PHPExcel_Chart_DataSeriesValues('Number', 'Graph!$B$2:$B$'.($cant+1), NULL, 90),

        );
        $ds=new \PHPExcel_Chart_DataSeries(
            \PHPExcel_Chart_DataSeries::TYPE_BARCHART,
            \PHPExcel_Chart_DataSeries::GROUPING_STANDARD,
            range(0, count($dsv)-1),
            $dsl,
            $xal,
            $dsv
        );
        $title=new \PHPExcel_Chart_Title($file_name);
        $pa=new \PHPExcel_Chart_PlotArea(NULL, array($ds));
        $layoout=new \PHPExcel_Chart_Layout();
        $layoout->setShowCatName(true);
        //$legend=new \PHPExcel_Chart_GridLines(\PHPExcel_Chart_GridLines::Colo, NULL, false);
        $chart= new \PHPExcel_Chart(
            'chart1',
            $title,
            null, //$legend,
            $pa,
            true,
            0,
            NULL,
            NULL
        );
        $chart->setTopLeftPosition('G1');//define donnde comienza
        $chart->setBottomRightPosition('R15');//define donde termina
        $objPHPExcel->getActiveSheet()->addChart($chart);
    }





}
