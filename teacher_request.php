<form action="Object/save_teacher_inquiry.php" name="inquiry" method="post">
<table width="100%" align="center">
 <tr>
    <td align="right">Training Level*</td>
    <td><select name="cmblevel" onchange="level(this.value)" class="normaltext">
        <option>Select Level</option>
         <option>वालविकास केन्द्र</option>
         <option>आधारभूत (१ –५)</option>
         <option>आधारभूत (६ –८)</option>
         <option>माध्यमिक(९ –१०)</option>
         <option>माध्यमिक(११ –१२)</option>
         <option>प्रधानाध्यापक (आधारभूत)</option>
          <option>प्रधानाध्यापक (माध्यमिक)</option>
		  <option>अन्य</option>
</select>
     </td>
    </tr>
<tr>
<td>Subject</td>
<td><input type="text" size="60" name="txtsubject" placeholder="आवश्यक तालिमको विषय"></td>
</tr>
<tr>
<td>Message</td>
<td><textarea cols="80" rows="10" name="txtmessage" placeholder="तपाइलाई आवश्यकता महशुसभएको तालिमका क्षेत्र तथा विषय वस्तु बुँदागत रुपमा उल्लेख गर्नुहोस ।"></textarea></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="Save Request" name="btnsave"></td>
</tr>
</table>

</form>
