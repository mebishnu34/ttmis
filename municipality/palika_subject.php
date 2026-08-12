<HTML>
<head>
</head>
<BODY>
    <form method="Post" Action="Object/save_palika_subject.php">
    <table class="subtable" cellpadding="10">
    <tr><td align="right">Faculty</td>
	<td>
		<select name="cmbfaculty">
         <option>शिक्षा</option>
         <option>मानविकी</option>
         <option>व्यवस्थापन</option>
         <option>विज्ञान </option>
         <option>अन्य </option>
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
    <td align="right">Name of Subject</td>
    <td>
    <input type="text" name="txtsubject" size="50" required>
     </td>
    </tr>
<tr>
    <td colspan="2" align="center"><input type="submit" name="btnsave" value="Save" class="button"></td>
    </tr>
    </table>
    </form>
</BODY>
</HTML>
