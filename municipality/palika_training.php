<HTML>
<head>
</head>
<BODY>
    <form method="Post" Action="Object/Save_Palika_Training.php">
    <table class="subtable" cellpadding="10">
    <tr>
    <td colspan="2" align="center">Training</td>
    </tr>
    <tr>
    <td align="right">Name of Training</td>
    <td><select name="cmbtraining">
                         <option>शिक्षक पेशागत विकास</option>
                        <option>पुनर्ताजगी</option>
                        <option>नेतृत्व तथा व्यवस्थापन</option>
                </select>
    </td>
    </tr>
        <tr>
    <td align="right">Level</td>
    <td><select name="cmblevel">
         <option>वालविकास केन्द्र</option>
         <option>आधारभूत (१ –५)</option>
         <option>आधारभूत (६ –८)</option>
         <option>माध्यमिक(९ –१०)</option>
         <option>माध्यमिक(११ –१२)</option>
         <option>प्रधानाध्यापक (आधारभूत)</option>
          <option>प्रधानाध्यापक (माध्यमिक)</optionn>
         <option>अन्य</option>
</select>
     </td>
    </tr>
    <td align="right">Subject</td>
    <td>
    <input type="text" name="txtsubject" size="50">
     </td>
    </tr>
<tr>
    <td colspan="2" align="center"><input type="submit" name="btnsave" value="Save" class="button"></td>
    </tr>
    </table>
    </form>
</BODY>
</HTML>
