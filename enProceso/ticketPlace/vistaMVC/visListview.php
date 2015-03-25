<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_vistaMVC
* Nombre del archivo	: vistaMVC.php
* Objetivo del archivo	: Vista del MVC
*
* Categoria				: PHP
* Paquete				: 010
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

/********************************************************************
* Desarrollo del codigo HTML de la vista
*********************************************************************/
?>

<div class="panel panel-default">
	<div class="panel-body">
        <div id="headerListView" class="page-header">
          <h1><?php echo $this->entListview->vTitulo ?>
            <small><?php echo $this->entListview->vSubTitulo ?></small>
          </h1>
        </div>

<?php
$vCont = 0;
if (count($this->entListview->arrListView) > 0): 
?>   
        <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-striped="true" data-sortOrder="desc" data-page-size="20">
          <thead>
            <tr>
			<?php 
                if(in_array('rowCount', $this->entListview->arrOptions)){
                    echo '<th data-sortable="true">#</th>';
                }
                
                $arrFieldNames = array_keys(current($this->entListview->arrListView));
                foreach($arrFieldNames as $vFieldName){
                    echo '<th data-field="'.$vFieldName.'" data-sortable="true">';
                    if(defined($vFieldName)){
                        echo constant($vFieldName);
                    }else{
                        echo $vFieldName;
                    }
                    echo '</th>';
                }
            ?>
            </tr>
          </thead>
          <tbody>
            <?php 
            $vCount = 0;
            foreach($this->entListview->arrListView as $arrListViewRow):
                $vCount++;
                array_map('htmlentities', $arrListViewRow);
            ?>
                <tr>
                    <?php
                        if(in_array('rowCount', $this->entListview->arrOptions)) echo '<td>'.$vCount.'</td>';
                        foreach($arrListViewRow as $vListViewField => $vListViewRow){
                            echo '<td>'.$this->clModelo->mExitField($vListViewRow, $vListViewField).'</td>';
                        }
                    ?>
                </tr>
            <?php endforeach; ?>
          <tbody>
        </table>
	<?php endif; ?>
  </div>
</div>

<?php
/*
<div class="btn-group">
        
        <button class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-export"></span>Exportar
        </button>
        <ul class="dropdown-menu" role="menu">
            <li>
                <a onclick="$('#downloadsTable').tableExport({type:'json',escape:'false'});">
                    <img src="./publicMVC/img/icons/json.png" width="24px"> JSON
                </a>
            </li>
            <li>
                <a onclick="$('#downloadsTable').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});">
                    <img src="./publicMVC/img/icons/json.png" width="24px"> JSON (ignoreColumn)
                </a>
            </li>
            <li>
                <a onclick="$('#downloadsTable').tableExport({type:'json',escape:'true'});">
                    <img src="./publicMVC/img/icons/json.png" width="24px"> JSON (with Escape)
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a onclick="$('#downloadsTable').tableExport({type:'xml',escape:'false'});">
                    <img src="./publicMVC/img/icons/xml.png" width="24px"> XML</a>
            </li>
            <li>
                <a onclick="$('#downloadsTable').tableExport({type:'sql'});">
                    <img src="./publicMVC/img/icons/sql.png" width="24px"> SQL
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a onclick="$('#downloadsTable').tableExport({type:'csv',escape:'false'});">
                    <img src="./publicMVC/img/icons/csv.png" width="24px"> CSV
                </a>
            </li>
            <li>
                <a onclick="$('#downloadsTable').tableExport({type:'txt',escape:'false'});">
                    <img src="./publicMVC/img/icons/txt.png" width="24px"> TXT
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a onclick="$('#downloadsTable').tableExport({type:'excel',escape:'false'});">
                    <img src="./publicMVC/img/icons/xls.png" width="24px"> XLS
                </a>
            </li>
            <li>
                <a onclick="$('#downloadsTable').tableExport({type:'doc',escape:'false'});">
                    <img src="./publicMVC/img/icons/word.png" width="24px"> Word
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a onclick="$('#downloadsTable').tableExport({type:'png',escape:'false'});">
                    <img src="./publicMVC/img/icons/png.png" width="24px"> PNG
                </a>
            </li>
            <li>
                <a  onclick="$('#downloadsTable').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});">
                    <img src="./publicMVC/img/icons/pdf.png" width="24px"> PDF
                </a>
            </li>
        </ul>
    </div>
	*/
	?>