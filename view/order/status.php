 
<div class="form-rule">
    <div id="OrderYear">
        <label>Year</label>
        <input type="text" name="" class="datepicker"/>
        <i class="far fa-calendar-alt"></i>

    </div>
    <div  >
        <label >Order Status</label>
        <select >
            <option>Actual</option>
        </select>

    </div>
    <div  >
        <label > Manufaturing</label>
        <select >
            <option> BOI</option>
        </select>

    </div>

</div>


<?php
//pshow($this->data);
?>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Rev.</th>
            <th>Srick</th> 
            <th>Holder</th>
             <th>Tray</th>
            <th>Order Qty. (A)</th>
            <th>NON BOI</th>
            <th>BOI</th>
            <th>Total Export Quantity (B)</th>
            <th>Remain Quantity (C=A-B)</th>
            <th>Status</th>
            <th style="width: 30px;">Manage</th>
        </tr>
    </thead>
    <tbody>
      
                <tr key={key}>
                    <td>1</td>
                    <td>KU-60</td>
                    <td>-</td>
                    <td>- </td> 
                    <td>-</td>
                    <td> - </td>
                    <td> -</td>
                    <td> -</td>
                    <td> -</td>
                    <td> -</td>
                    <td> -</td>
                    <td> P</td>
                    <td> 
                        <a href="#"><i class="fa fa-pencil-alt"></i></a>
                    </td>
                </tr>
                <tr key={key}>
                    <td>1</td>
                    <td>KU-63 SET</td>
                    <td>01</td>
                    <td> KI-2 </td> 
                    <td> KIC RED2096</td>
                    <td> KIC BLACK </td>
                    <td>70000</td>
                    <td> 10000</td>
                    <td> -</td>
                    <td> 10000</td>
                    <td> 60000</td>
                    <td> M</td>
                    <td> 
                        <a href="#"><i class="fa fa-pencil-alt"></i></a>
                    </td>
                </tr>
                <tr key={key}>
                    <td>1</td>
                    <td>DISPO CHIP-LL(A026)</td>
                    <td>04</td>
                    <td>SET (Case) </td> 
                    <td>-</td>
                    <td> - </td>
                    <td> -</td>
                    <td> -</td>
                    <td> -</td>
                    <td> -</td>
                    <td> -</td>
                    <td> F</td>
                    <td> 
                        <a href="#"><i class="fa fa-pencil-alt"></i></a>
                    </td>
                </tr>
              

    </tbody>
</table>

<div id="TableFooter">
    <label> All : 3 </label>
    <label> Page : 1 / 1 </label>      
</div>
