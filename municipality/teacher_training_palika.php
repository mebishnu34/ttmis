<script type="text/javascript" src="script/subject_palika.js"></script>
<div class="row">
	<div class="column1">
				Training: <Select id="cmbtraining" class="normaltext" onChange="selecttraining()">
                 <option>सबै</option>
				 <option>शिक्षक पेशागत विकास</option>
                        <option>पुनर्ताजगी</option>
                        <option>नेतृत्व तथा व्यवस्थापन</option>
                </select>
	</div>
	<div class="column_gap">
	&nbsp;
	</div>
	<div class="column2">
		Level:<select id="cmblevel" class="normaltext" onChange="selectlevel()">
		<option>सबै</option>
         <option>वालविकास केन्द्र</option>
         <option>आधारभूत (१ –५)</option>
         <option>आधारभूत (६ –८)</option>
         <option>माध्यमिक(९ –१०)</option>
         <option>माध्यमिक(११ –१२)</option>
         <option>प्रधानाध्यापक (आधारभूत)</option>
          <option>प्रधानाध्यापक (माध्यमिक)</option>
		  <option>अन्य</option>
		</select>
	</div>
	<div class="column_gap">
	&nbsp;
	</div>
	<div class="column3">
		<div id="displaydata"></div> 
			</div>
	</div>
<div id="displayreport"></div>
<br>
<br>
<div align="center" style="background-color:#0000FF"><a href="export/export_palika_teacher_training.php" target="_blank">Export In Excel</a></div>