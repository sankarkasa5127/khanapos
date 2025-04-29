<table class="table table-bordered table-hover">
                                    <thead>
                                                <tr>
                                                <th class="text-center">
                                                #
                                                </th>
                                               
                                                <th class="text-center">
                                                Description
                                                </th>
                                                <th class="text-center">
                                                Method
                                                </th>
                                                <th class="text-center">
                                                Date
                                                </th>
                                                <th class="text-center">
                                                  Action
                                                </th>
                                                </tr>
                                            </thead>
                                            <tbody id="appendVersand">
                                                    
                                                    <tbody>
                                     </table>
                                          <table class="table table-bordered table-hover" id="tab_logic">
                                           
                                            <tbody><form method="post" action="javascript:void(0);" id="formVersand">
                                                    <tr id='addr0'>
                                                    <td>
                                                    <input type="text" name='description' value="" placeholder='Description...' class="form-control"/>
                                                    </td>
                                                    <td>
                                                            <select class="form-select form-select-lg" name="method">
                                                                    <option value="Post">Post</option>
                                                                    <option value="E-mail">E-mail</option>
                                                                    <option value="By Hand">by Hand</option>
                                                                    <option value="Whatsapp">Whatsapp</option>
                                                                    <option value="DHL">DHL</option>
                                                                    <option value="Anwalt">Anwalt</option>
                                                                    <option value="Gericht">Gericht</option>
                                                            </select>
                                                    </td>
                                                    <td>
                                                    <input type="hidden" name="invoiceid" class="roweditid" value="" />
                                                    <input type="date" name='date' placeholder='Date' data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/>
                                                    </td>
                                                    
                                                    
                                                    <td>
                                                        <button  class=" btn btn-primary" type="submit">Add Versand</button>
                                                        <img class="loader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
    width: 50px;
    height: 34px;
    display:none;
">
                                                             
                                                    </td>
                                                    </tr>
        </form>
                                            </tbody>
                                          </table>