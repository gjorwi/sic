<?php defined ('BASEPATH') OR exit ('No direct script access allowed');
/**
 *
 * excel
 */
class Excel extends CI_Controller {


    /**
     *
     * __construct
     */
    public function __construct () {
        parent::__construct();
         
        // inicializamos la librería
        $this->load->library('Clases/PHPExcel.php');
        $this->load->helper(array('validaciones')); 

    }
    // end: construc
     
     
     
     
     
    /**
     *
     * setExcel
     */
    public function setExcelTodo () {

        $mta          = new Mesatecnica;
        $mesatecnica  = new Mesatecnica;
        $persona      = new Persona;

        $persona->get_by_id($this->session->userdata('persona_id'));
         
        // configuramos las propiedades del documento
        $this->phpexcel->getProperties()->setCreator($persona->nombres.' '.$persona->apellidos)
                                     ->setLastModifiedBy($persona->nombres.' '.$persona->apellidos)
                                     ->setTitle("Mesa Tecnica de Agua")
                                     ->setSubject("Excel")
                                     ->setDescription("Reporte General de Todas las Mesas Tecnicas de Agua")
                                     ->setKeywords("Openxml php")
                                     ->setCategory("Reportes");
         
        $this->phpexcel->getActiveSheet()->setCellValue('A1', 'MESAS TECNICAS DE AGUA'); 

        $this->phpexcel->getActiveSheet()->mergeCells('A1:AI1');

        $this->phpexcel->getActiveSheet()->getStyle('A1:AI2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->phpexcel->getActiveSheet()->getStyle('A1:AI3')->getFont()->setBold(true);
        $this->phpexcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(13);
        $this->phpexcel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
            
        $nCols = 35;
            
        foreach (range(0, $nCols) as $col){
                //set column dimension
                $this->phpexcel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(true);
                 //change the font size
                $this->phpexcel->getActiveSheet()->getStyle($col)->getFont()->setSize(12);
                 
                $this->phpexcel->getActiveSheet()->getStyle($col)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        }


        // agregamos información a las celdas
        $this->phpexcel->setActiveSheetIndex(0)
                     ->setCellValue('A3', 'RIF M.T.A.')
                     ->setCellValue('B3', 'NOMBRE M.T.A.')
                     ->setCellValue('C3', 'NUMERO DE CUENTA M.T.A.')
                     ->setCellValue('D3', 'FECHA DE CONFORMACION M.T.A.')
                     ->setCellValue('E2', 'AGUA POTABLE Y SANEAMIENTO')
                     ->setCellValue('E3', 'CEDULA')
                     ->setCellValue('F3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('G3', 'TELEFONO')
                     ->setCellValue('H2', 'ADMINISTRACION Y FINANZAS')
                     ->setCellValue('H3', 'CEDULA')
                     ->setCellValue('I3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('J3', 'TELEFONO')
                     ->setCellValue('K2', 'CONTRALORIA SOCIAL')
                     ->setCellValue('K3', 'CEDULA')
                     ->setCellValue('L3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('M3', 'TELEFONO')
                     ->setCellValue('N2', 'EDUCACION AMBIENTAL')
                     ->setCellValue('N3', 'CEDULA')
                     ->setCellValue('O3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('P3', 'TELEFONO')
                     ->setCellValue('Q2', 'SUP. AGUA POTABLE Y SANEAMIENTO')
                     ->setCellValue('Q3', 'CEDULA')
                     ->setCellValue('R3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('S3', 'TELEFONO')
                     ->setCellValue('T2', 'SUP. ADMINISTRACION Y FINANZAS')
                     ->setCellValue('T3', 'CEDULA')
                     ->setCellValue('U3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('V3', 'TELEFONO')
                     ->setCellValue('W2', 'SUP. CONTRALORIA SOCIAL')
                     ->setCellValue('W3', 'CEDULA')
                     ->setCellValue('X3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('Y3', 'TELEFONO')
                     ->setCellValue('Z2', 'SUP. EDUCACION AMBIENTAL')
                     ->setCellValue('Z3', 'CEDULA')
                     ->setCellValue('AA3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('AB3', 'TELEFONO')
                     ->setCellValue('AC3', 'CONSEJO COMUNAL')
                     ->setCellValue('AD3', 'ESTADO')
                     ->setCellValue('AE3', 'MUNICIPIO')
                     ->setCellValue('AF3', 'PARROQUIA')
                     ->setCellValue('AG3', 'SECTOR')
                     ->setCellValue('AH2', 'DATOS DEL PROMOTOR')
                     ->setCellValue('AH3', 'CEDULA')
                     ->setCellValue('AI3', 'NOMBRE Y APELLIDO');

            $this->phpexcel->getActiveSheet()->mergeCells('E2:G2');
            $this->phpexcel->getActiveSheet()->mergeCells('H2:J2');
            $this->phpexcel->getActiveSheet()->mergeCells('K2:M2');
            $this->phpexcel->getActiveSheet()->mergeCells('N2:P2');
            $this->phpexcel->getActiveSheet()->mergeCells('Q2:S2');
            $this->phpexcel->getActiveSheet()->mergeCells('T2:V2');
            $this->phpexcel->getActiveSheet()->mergeCells('W2:Y2');
            $this->phpexcel->getActiveSheet()->mergeCells('Z2:AB2');    
            $this->phpexcel->getActiveSheet()->mergeCells('AH2:AI2');     

            $perfilmta_id = $this->session->userdata('perfilmta_id');

            $mta->include_related('consejocomunal', '*');
            $mta->where('est_cco', 'TRUE');
            $mta->include_related('estado', '*');
            $mta->where('est_est', 'TRUE');
            $mta->include_related('municipio', '*');
            $mta->where('est_mun', 'TRUE');
            $mta->include_related('parroquia', '*');
            $mta->where('est_par', 'TRUE');
            $mta->include_related('sector', '*');
            $mta->where('est_sec', 'TRUE');         
            $mta->include_related('municipio/perfilmta', '*');
            $mta->where('est_pmt', 'TRUE');
            $mta->where('permisomta', 'TRUE');
            $mta->where('perfilmta_id', $perfilmta_id);
            $mta->order_by('id', 'ASC')->get();    

            $mesatecnica->include_related('persona', '*');
            $mesatecnica->where('est_prs', 'TRUE');
            $mesatecnica->order_by('id_mes_prs', 'ASC');             
            $mesatecnica->include_related('municipio/perfilmta', '*');
            $mesatecnica->where('est_pmt', 'TRUE');
            $mesatecnica->where('permisomta', 'TRUE');
            $mesatecnica->where('perfilmta_id', $perfilmta_id);
            $mesatecnica->order_by('id', 'ASC')->get();

            $i = 0;
            foreach ($mesatecnica as $row):

                $array[$row->id]['cedula'][$i]    = $row->persona_cedula;
                $array[$row->id]['nombres'][$i]   = $row->persona_nombres.' '.$row->persona_apellidos;
                $array[$row->id]['telefono'][$i]  = $row->persona_telefonom;

                if ($i == 7):

                    $i = 0;

                else:

                    $i++;

                endif;

            endforeach;     

        $i= 4;             
        foreach ($mta as $row):

            $this->phpexcel->setActiveSheetIndex(0)
                     ->setCellValue('A'.$i, $row->tiporifmta.'-'.$row->rifmta)
                     ->setCellValue('B'.$i, $row->nom_mta)
                     ->setCellValue('C'.$i, $row->num_cuenta)
                     ->setCellValue('D'.$i, formatoFecha($row->fechaconform))   
                     ->setCellValue('E'.$i, $array[$row->id]['cedula'][0])
                     ->setCellValue('F'.$i, $array[$row->id]['nombres'][0])
                     ->setCellValue('G'.$i, $array[$row->id]['telefono'][0])
                     ->setCellValue('H'.$i, $array[$row->id]['cedula'][1])
                     ->setCellValue('I'.$i, $array[$row->id]['nombres'][1])
                     ->setCellValue('J'.$i, $array[$row->id]['telefono'][1])
                     ->setCellValue('K'.$i, $array[$row->id]['cedula'][2])
                     ->setCellValue('L'.$i, $array[$row->id]['nombres'][2])
                     ->setCellValue('M'.$i, $array[$row->id]['telefono'][2])
                     ->setCellValue('N'.$i, $array[$row->id]['cedula'][3])
                     ->setCellValue('O'.$i, $array[$row->id]['nombres'][3])
                     ->setCellValue('P'.$i, $array[$row->id]['telefono'][3])
                     ->setCellValue('Q'.$i, $array[$row->id]['cedula'][4])
                     ->setCellValue('R'.$i, $array[$row->id]['nombres'][4])
                     ->setCellValue('S'.$i, $array[$row->id]['telefono'][4])
                     ->setCellValue('T'.$i, $array[$row->id]['cedula'][5])
                     ->setCellValue('U'.$i, $array[$row->id]['nombres'][5])
                     ->setCellValue('V'.$i, $array[$row->id]['telefono'][5])
                     ->setCellValue('W'.$i, $array[$row->id]['cedula'][6])
                     ->setCellValue('X'.$i, $array[$row->id]['nombres'][6])
                     ->setCellValue('Y'.$i, $array[$row->id]['telefono'][6])
                     ->setCellValue('Z'.$i, $array[$row->id]['cedula'][7])
                     ->setCellValue('AA'.$i, $array[$row->id]['nombres'][7])
                     ->setCellValue('AB'.$i, $array[$row->id]['telefono'][7])
                     ->setCellValue('AC'.$i, $row->consejocomunal_nombrecc)
                     ->setCellValue('AD'.$i, validarEntrada($row->estado_nom_est))
                     ->setCellValue('AE'.$i, validarEntrada($row->municipio_nom_mun))
                     ->setCellValue('AF'.$i, validarEntrada($row->parroquia_nom_par))
                     ->setCellValue('AG'.$i, $row->sector_nom_sec)
                     ->setCellValue('AH'.$i, $row->registrado_por2)
                     ->setCellValue('AI'.$i, validarEntrada($row->registrado_por1));
         $i++;     
        endforeach;             
         
        // Renombramos la hoja de trabajo
        $this->phpexcel->getActiveSheet()->setTitle('Mesa Tecnicas');
         
         
        // configuramos el documento para que la hoja
        // de trabajo número 0 sera la primera en mostrarse
        // al abrir el documento
        $this->phpexcel->setActiveSheetIndex(0);
         
         
        // redireccionamos la salida al navegador del cliente (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Reporte_Mta.xlsx"');
        header('Cache-Control: max-age=0');
         
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
        $objWriter->save('php://output');
         
    }
    // end: setExcel

    /**
     *
     * setExcel
     */
    public function setExcelActiva () {

        $mta          = new Mesatecnica;
        $mesatecnica  = new Mesatecnica;
        $persona      = new Persona;

        $persona->get_by_id($this->session->userdata('persona_id'));
         
        // configuramos las propiedades del documento
        $this->phpexcel->getProperties()->setCreator($persona->nombres.' '.$persona->apellidos)
                                     ->setLastModifiedBy($persona->nombres.' '.$persona->apellidos)
                                     ->setTitle("Mesa Tecnica de Agua")
                                     ->setSubject("Excel")
                                     ->setDescription("Reporte General de Todas las Mesas Tecnicas de Agua")
                                     ->setKeywords("Openxml php")
                                     ->setCategory("Reportes");
         
        $this->phpexcel->getActiveSheet()->setCellValue('A1', 'MESAS TECNICAS DE AGUA'); 

        $this->phpexcel->getActiveSheet()->mergeCells('A1:AI1');

        $this->phpexcel->getActiveSheet()->getStyle('A1:AI2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->phpexcel->getActiveSheet()->getStyle('A1:AI3')->getFont()->setBold(true);
        $this->phpexcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(13);
        $this->phpexcel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
            
        $nCols = 35;
            
        foreach (range(0, $nCols) as $col){
                //set column dimension
                $this->phpexcel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(true);
                 //change the font size
                $this->phpexcel->getActiveSheet()->getStyle($col)->getFont()->setSize(12);
                 
                $this->phpexcel->getActiveSheet()->getStyle($col)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        }


        // agregamos información a las celdas
        $this->phpexcel->setActiveSheetIndex(0)
                     ->setCellValue('A3', 'RIF M.T.A.')
                     ->setCellValue('B3', 'NOMBRE M.T.A.')
                     ->setCellValue('C3', 'NUMERO DE CUENTA M.T.A.')
                     ->setCellValue('D3', 'FECHA DE CONFORMACION M.T.A.')
                     ->setCellValue('E2', 'AGUA POTABLE Y SANEAMIENTO')
                     ->setCellValue('E3', 'CEDULA')
                     ->setCellValue('F3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('G3', 'TELEFONO')
                     ->setCellValue('H2', 'ADMINISTRACION Y FINANZAS')
                     ->setCellValue('H3', 'CEDULA')
                     ->setCellValue('I3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('J3', 'TELEFONO')
                     ->setCellValue('K2', 'CONTRALORIA SOCIAL')
                     ->setCellValue('K3', 'CEDULA')
                     ->setCellValue('L3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('M3', 'TELEFONO')
                     ->setCellValue('N2', 'EDUCACION AMBIENTAL')
                     ->setCellValue('N3', 'CEDULA')
                     ->setCellValue('O3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('P3', 'TELEFONO')
                     ->setCellValue('Q2', 'SUP. AGUA POTABLE Y SANEAMIENTO')
                     ->setCellValue('Q3', 'CEDULA')
                     ->setCellValue('R3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('S3', 'TELEFONO')
                     ->setCellValue('T2', 'SUP. ADMINISTRACION Y FINANZAS')
                     ->setCellValue('T3', 'CEDULA')
                     ->setCellValue('U3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('V3', 'TELEFONO')
                     ->setCellValue('W2', 'SUP. CONTRALORIA SOCIAL')
                     ->setCellValue('W3', 'CEDULA')
                     ->setCellValue('X3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('Y3', 'TELEFONO')
                     ->setCellValue('Z2', 'SUP. EDUCACION AMBIENTAL')
                     ->setCellValue('Z3', 'CEDULA')
                     ->setCellValue('AA3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('AB3', 'TELEFONO')
                     ->setCellValue('AC3', 'CONSEJO COMUNAL')
                     ->setCellValue('AD3', 'ESTADO')
                     ->setCellValue('AE3', 'MUNICIPIO')
                     ->setCellValue('AF3', 'PARROQUIA')
                     ->setCellValue('AG3', 'SECTOR')
                     ->setCellValue('AH2', 'DATOS DEL PROMOTOR')
                     ->setCellValue('AH3', 'CEDULA')
                     ->setCellValue('AI3', 'NOMBRE Y APELLIDO');

            $this->phpexcel->getActiveSheet()->mergeCells('E2:G2');
            $this->phpexcel->getActiveSheet()->mergeCells('H2:J2');
            $this->phpexcel->getActiveSheet()->mergeCells('K2:M2');
            $this->phpexcel->getActiveSheet()->mergeCells('N2:P2');
            $this->phpexcel->getActiveSheet()->mergeCells('Q2:S2');
            $this->phpexcel->getActiveSheet()->mergeCells('T2:V2');
            $this->phpexcel->getActiveSheet()->mergeCells('W2:Y2');
            $this->phpexcel->getActiveSheet()->mergeCells('Z2:AB2');    
            $this->phpexcel->getActiveSheet()->mergeCells('AH2:AI2');     

            $perfilmta_id = $this->session->userdata('perfilmta_id');

            $mta->include_related('consejocomunal', '*');
            $mta->where('est_cco', 'TRUE');
            $mta->include_related('estado', '*');
            $mta->where('est_est', 'TRUE');
            $mta->include_related('municipio', '*');
            $mta->where('est_mun', 'TRUE');
            $mta->include_related('parroquia', '*');
            $mta->where('est_par', 'TRUE');
            $mta->include_related('sector', '*');
            $mta->where('est_sec', 'TRUE');         
            $mta->include_related('municipio/perfilmta', '*');
            $mta->where('est_pmt', 'TRUE');
            $mta->where('est_mes', 'TRUE');
            $mta->where('permisomta', 'TRUE');
            $mta->where('perfilmta_id', $perfilmta_id);
            $mta->order_by('id', 'ASC')->get();    

            $mesatecnica->include_related('persona', '*');
            $mesatecnica->where('est_prs', 'TRUE');
            $mesatecnica->order_by('id_mes_prs', 'ASC');             
            $mesatecnica->include_related('municipio/perfilmta', '*');
            $mesatecnica->where('est_pmt', 'TRUE');
            $mesatecnica->where('permisomta', 'TRUE');
            $mesatecnica->where('est_mes', 'TRUE');
            $mesatecnica->where('perfilmta_id', $perfilmta_id);
            $mesatecnica->order_by('id', 'ASC')->get();

            $i = 0;
            foreach ($mesatecnica as $row):

                $array[$row->id]['cedula'][$i]    = $row->persona_cedula;
                $array[$row->id]['nombres'][$i]   = $row->persona_nombres.' '.$row->persona_apellidos;
                $array[$row->id]['telefono'][$i]  = $row->persona_telefonom;

                if ($i == 7):

                    $i = 0;

                else:

                    $i++;

                endif;

            endforeach;     

        $i= 4;             
        foreach ($mta as $row):

            $this->phpexcel->setActiveSheetIndex(0)
                     ->setCellValue('A'.$i, $row->tiporifmta.'-'.$row->rifmta)
                     ->setCellValue('B'.$i, $row->nom_mta)
                     ->setCellValue('C'.$i, $row->num_cuenta)
                     ->setCellValue('D'.$i, formatoFecha($row->fechaconform))   
                     ->setCellValue('E'.$i, $array[$row->id]['cedula'][0])
                     ->setCellValue('F'.$i, $array[$row->id]['nombres'][0])
                     ->setCellValue('G'.$i, $array[$row->id]['telefono'][0])
                     ->setCellValue('H'.$i, $array[$row->id]['cedula'][1])
                     ->setCellValue('I'.$i, $array[$row->id]['nombres'][1])
                     ->setCellValue('J'.$i, $array[$row->id]['telefono'][1])
                     ->setCellValue('K'.$i, $array[$row->id]['cedula'][2])
                     ->setCellValue('L'.$i, $array[$row->id]['nombres'][2])
                     ->setCellValue('M'.$i, $array[$row->id]['telefono'][2])
                     ->setCellValue('N'.$i, $array[$row->id]['cedula'][3])
                     ->setCellValue('O'.$i, $array[$row->id]['nombres'][3])
                     ->setCellValue('P'.$i, $array[$row->id]['telefono'][3])
                     ->setCellValue('Q'.$i, $array[$row->id]['cedula'][4])
                     ->setCellValue('R'.$i, $array[$row->id]['nombres'][4])
                     ->setCellValue('S'.$i, $array[$row->id]['telefono'][4])
                     ->setCellValue('T'.$i, $array[$row->id]['cedula'][5])
                     ->setCellValue('U'.$i, $array[$row->id]['nombres'][5])
                     ->setCellValue('V'.$i, $array[$row->id]['telefono'][5])
                     ->setCellValue('W'.$i, $array[$row->id]['cedula'][6])
                     ->setCellValue('X'.$i, $array[$row->id]['nombres'][6])
                     ->setCellValue('Y'.$i, $array[$row->id]['telefono'][6])
                     ->setCellValue('Z'.$i, $array[$row->id]['cedula'][7])
                     ->setCellValue('AA'.$i, $array[$row->id]['nombres'][7])
                     ->setCellValue('AB'.$i, $array[$row->id]['telefono'][7])
                     ->setCellValue('AC'.$i, $row->consejocomunal_nombrecc)
                     ->setCellValue('AD'.$i, validarEntrada($row->estado_nom_est))
                     ->setCellValue('AE'.$i, validarEntrada($row->municipio_nom_mun))
                     ->setCellValue('AF'.$i, validarEntrada($row->parroquia_nom_par))
                     ->setCellValue('AG'.$i, $row->sector_nom_sec)
                     ->setCellValue('AH'.$i, $row->registrado_por2)
                     ->setCellValue('AI'.$i, validarEntrada($row->registrado_por1));
         $i++;     
        endforeach;             
         
        // Renombramos la hoja de trabajo
        $this->phpexcel->getActiveSheet()->setTitle('Mesa Tecnicas');
         
         
        // configuramos el documento para que la hoja
        // de trabajo número 0 sera la primera en mostrarse
        // al abrir el documento
        $this->phpexcel->setActiveSheetIndex(0);
         
         
        // redireccionamos la salida al navegador del cliente (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Reporte_Mta.xlsx"');
        header('Cache-Control: max-age=0');
         
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
        $objWriter->save('php://output');
         
    }
    // end: setExcel

    /**
     *
     * setExcel
     */
    public function setExcelInactiva () {

        $mta          = new Mesatecnica;
        $mesatecnica  = new Mesatecnica;
        $persona      = new Persona;

        $persona->get_by_id($this->session->userdata('persona_id'));
         
        // configuramos las propiedades del documento
        $this->phpexcel->getProperties()->setCreator($persona->nombres.' '.$persona->apellidos)
                                     ->setLastModifiedBy($persona->nombres.' '.$persona->apellidos)
                                     ->setTitle("Mesa Tecnica de Agua")
                                     ->setSubject("Excel")
                                     ->setDescription("Reporte General de Todas las Mesas Tecnicas de Agua")
                                     ->setKeywords("Openxml php")
                                     ->setCategory("Reportes");
         
        $this->phpexcel->getActiveSheet()->setCellValue('A1', 'MESAS TECNICAS DE AGUA'); 

        $this->phpexcel->getActiveSheet()->mergeCells('A1:AI1');

        $this->phpexcel->getActiveSheet()->getStyle('A1:AI2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $this->phpexcel->getActiveSheet()->getStyle('A1:AI3')->getFont()->setBold(true);
        $this->phpexcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(13);
        $this->phpexcel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
            
        $nCols = 35;
            
        foreach (range(0, $nCols) as $col){
                //set column dimension
                $this->phpexcel->getActiveSheet()->getColumnDimensionByColumn($col)->setAutoSize(true);
                 //change the font size
                $this->phpexcel->getActiveSheet()->getStyle($col)->getFont()->setSize(12);
                 
                $this->phpexcel->getActiveSheet()->getStyle($col)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        }


        // agregamos información a las celdas
        $this->phpexcel->setActiveSheetIndex(0)
                     ->setCellValue('A3', 'RIF M.T.A.')
                     ->setCellValue('B3', 'NOMBRE M.T.A.')
                     ->setCellValue('C3', 'NUMERO DE CUENTA M.T.A.')
                     ->setCellValue('D3', 'FECHA DE CONFORMACION M.T.A.')
                     ->setCellValue('E2', 'AGUA POTABLE Y SANEAMIENTO')
                     ->setCellValue('E3', 'CEDULA')
                     ->setCellValue('F3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('G3', 'TELEFONO')
                     ->setCellValue('H2', 'ADMINISTRACION Y FINANZAS')
                     ->setCellValue('H3', 'CEDULA')
                     ->setCellValue('I3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('J3', 'TELEFONO')
                     ->setCellValue('K2', 'CONTRALORIA SOCIAL')
                     ->setCellValue('K3', 'CEDULA')
                     ->setCellValue('L3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('M3', 'TELEFONO')
                     ->setCellValue('N2', 'EDUCACION AMBIENTAL')
                     ->setCellValue('N3', 'CEDULA')
                     ->setCellValue('O3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('P3', 'TELEFONO')
                     ->setCellValue('Q2', 'SUP. AGUA POTABLE Y SANEAMIENTO')
                     ->setCellValue('Q3', 'CEDULA')
                     ->setCellValue('R3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('S3', 'TELEFONO')
                     ->setCellValue('T2', 'SUP. ADMINISTRACION Y FINANZAS')
                     ->setCellValue('T3', 'CEDULA')
                     ->setCellValue('U3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('V3', 'TELEFONO')
                     ->setCellValue('W2', 'SUP. CONTRALORIA SOCIAL')
                     ->setCellValue('W3', 'CEDULA')
                     ->setCellValue('X3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('Y3', 'TELEFONO')
                     ->setCellValue('Z2', 'SUP. EDUCACION AMBIENTAL')
                     ->setCellValue('Z3', 'CEDULA')
                     ->setCellValue('AA3', 'NOMBRES Y APELLIDOS')
                     ->setCellValue('AB3', 'TELEFONO')
                     ->setCellValue('AC3', 'CONSEJO COMUNAL')
                     ->setCellValue('AD3', 'ESTADO')
                     ->setCellValue('AE3', 'MUNICIPIO')
                     ->setCellValue('AF3', 'PARROQUIA')
                     ->setCellValue('AG3', 'SECTOR')
                     ->setCellValue('AH2', 'DATOS DEL PROMOTOR')
                     ->setCellValue('AH3', 'CEDULA')
                     ->setCellValue('AI3', 'NOMBRE Y APELLIDO');

            $this->phpexcel->getActiveSheet()->mergeCells('E2:G2');
            $this->phpexcel->getActiveSheet()->mergeCells('H2:J2');
            $this->phpexcel->getActiveSheet()->mergeCells('K2:M2');
            $this->phpexcel->getActiveSheet()->mergeCells('N2:P2');
            $this->phpexcel->getActiveSheet()->mergeCells('Q2:S2');
            $this->phpexcel->getActiveSheet()->mergeCells('T2:V2');
            $this->phpexcel->getActiveSheet()->mergeCells('W2:Y2');
            $this->phpexcel->getActiveSheet()->mergeCells('Z2:AB2');    
            $this->phpexcel->getActiveSheet()->mergeCells('AH2:AI2');     

            $perfilmta_id = $this->session->userdata('perfilmta_id');

            $mta->include_related('consejocomunal', '*');
            $mta->where('est_cco', 'TRUE');
            $mta->include_related('estado', '*');
            $mta->where('est_est', 'TRUE');
            $mta->include_related('municipio', '*');
            $mta->where('est_mun', 'TRUE');
            $mta->include_related('parroquia', '*');
            $mta->where('est_par', 'TRUE');
            $mta->include_related('sector', '*');
            $mta->where('est_sec', 'TRUE');         
            $mta->include_related('municipio/perfilmta', '*');
            $mta->where('est_pmt', 'TRUE');
            $mta->where('permisomta', 'TRUE');
            $mta->where('est_mes', 'FALSE');
            $mta->where('perfilmta_id', $perfilmta_id);
            $mta->order_by('id', 'ASC')->get();    

            $mesatecnica->include_related('persona', '*');
            $mesatecnica->where('est_prs', 'TRUE');
            $mesatecnica->order_by('id_mes_prs', 'ASC');             
            $mesatecnica->include_related('municipio/perfilmta', '*');
            $mesatecnica->where('est_pmt', 'TRUE');
            $mesatecnica->where('permisomta', 'TRUE');
            $mesatecnica->where('permisomta', 'FALSE');
            $mesatecnica->where('perfilmta_id', $perfilmta_id);
            $mesatecnica->order_by('id', 'ASC')->get();

            $i = 0;
            foreach ($mesatecnica as $row):

                $array[$row->id]['cedula'][$i]    = $row->persona_cedula;
                $array[$row->id]['nombres'][$i]   = $row->persona_nombres.' '.$row->persona_apellidos;
                $array[$row->id]['telefono'][$i]  = $row->persona_telefonom;

                if ($i == 7):

                    $i = 0;

                else:

                    $i++;

                endif;

            endforeach;     

        $i= 4;             
        foreach ($mta as $row):

            $this->phpexcel->setActiveSheetIndex(0)
                     ->setCellValue('A'.$i, $row->tiporifmta.'-'.$row->rifmta)
                     ->setCellValue('B'.$i, $row->nom_mta)
                     ->setCellValue('C'.$i, $row->num_cuenta)
                     ->setCellValue('D'.$i, formatoFecha($row->fechaconform))   
                     ->setCellValue('E'.$i, $array[$row->id]['cedula'][0])
                     ->setCellValue('F'.$i, $array[$row->id]['nombres'][0])
                     ->setCellValue('G'.$i, $array[$row->id]['telefono'][0])
                     ->setCellValue('H'.$i, $array[$row->id]['cedula'][1])
                     ->setCellValue('I'.$i, $array[$row->id]['nombres'][1])
                     ->setCellValue('J'.$i, $array[$row->id]['telefono'][1])
                     ->setCellValue('K'.$i, $array[$row->id]['cedula'][2])
                     ->setCellValue('L'.$i, $array[$row->id]['nombres'][2])
                     ->setCellValue('M'.$i, $array[$row->id]['telefono'][2])
                     ->setCellValue('N'.$i, $array[$row->id]['cedula'][3])
                     ->setCellValue('O'.$i, $array[$row->id]['nombres'][3])
                     ->setCellValue('P'.$i, $array[$row->id]['telefono'][3])
                     ->setCellValue('Q'.$i, $array[$row->id]['cedula'][4])
                     ->setCellValue('R'.$i, $array[$row->id]['nombres'][4])
                     ->setCellValue('S'.$i, $array[$row->id]['telefono'][4])
                     ->setCellValue('T'.$i, $array[$row->id]['cedula'][5])
                     ->setCellValue('U'.$i, $array[$row->id]['nombres'][5])
                     ->setCellValue('V'.$i, $array[$row->id]['telefono'][5])
                     ->setCellValue('W'.$i, $array[$row->id]['cedula'][6])
                     ->setCellValue('X'.$i, $array[$row->id]['nombres'][6])
                     ->setCellValue('Y'.$i, $array[$row->id]['telefono'][6])
                     ->setCellValue('Z'.$i, $array[$row->id]['cedula'][7])
                     ->setCellValue('AA'.$i, $array[$row->id]['nombres'][7])
                     ->setCellValue('AB'.$i, $array[$row->id]['telefono'][7])
                     ->setCellValue('AC'.$i, $row->consejocomunal_nombrecc)
                     ->setCellValue('AD'.$i, validarEntrada($row->estado_nom_est))
                     ->setCellValue('AE'.$i, validarEntrada($row->municipio_nom_mun))
                     ->setCellValue('AF'.$i, validarEntrada($row->parroquia_nom_par))
                     ->setCellValue('AG'.$i, $row->sector_nom_sec)
                     ->setCellValue('AH'.$i, $row->registrado_por2)
                     ->setCellValue('AI'.$i, validarEntrada($row->registrado_por1));
         $i++;     
        endforeach;             
         
        // Renombramos la hoja de trabajo
        $this->phpexcel->getActiveSheet()->setTitle('Mesa Tecnicas');
         
         
        // configuramos el documento para que la hoja
        // de trabajo número 0 sera la primera en mostrarse
        // al abrir el documento
        $this->phpexcel->setActiveSheetIndex(0);
         
         
        // redireccionamos la salida al navegador del cliente (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Reporte_Mta.xlsx"');
        header('Cache-Control: max-age=0');
         
        $objWriter = PHPExcel_IOFactory::createWriter($this->phpexcel, 'Excel2007');
        $objWriter->save('php://output');
         
    }
    // end: setExcel
}
// end: excel