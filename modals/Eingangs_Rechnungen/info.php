<form id="editForm" action="javascript:;" enctype="multipart/form-data">
                                    <input type="hidden" name="rowid" class="roweditid" value="" />
                                    <div class="form-row ">
                                    <div class="form-group col-md-12">
                                          <label for="recipient-name" class="col-form-label">Kunden Name:</label>
                                          <input type="text" class="form-control rowedit3" id="kunden_name" name="kunden_name">
                                       </div>
                                    </div>
                                    <div class="form-row ">
                                       <div class="form-group col-md-4">
                                          <label for="recipient-name" class="col-form-label">Rechnung Nummer:</label>
                                          <input type="text" class="form-control rowedit1" id="rechnung_nummer" name="rechnung_nummer">
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="recipient-name" class="col-form-label">Kunden Nr:</label>
                                          <input type="text" class="form-control rowedit2" id="kunden_nr" name="kunden_nr">
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="recipient-name" class="col-form-label">Rechnung Datum:</label>
                                          <input type="text" class="form-control rowedit5" id="rechnung_datum" name="rechnung_datum">
                                       </div>
                                      
                                    </div>
                                    <div class="form-row ">
                                       <div class="form-group col-md-4">
                                          <label for="recipient-name" class="col-form-label">Betrag Brutto:</label>
                                          <input type="text" class="form-control rowedit6" id="betrag_brutto" name="betrag_brutto">
                                       </div>
                                       <div class="form-group col-md-4" ><label for="recipient-name" class="col-form-label">Bezahlt :</label><input type="text" class="form-control rowedit7" id="Bezahlt" name="Bezahlt" readonly /></div>
                                     
                                       <div class="form-group col-md-4">
                                          <label for="recipient-name" class="col-form-label">Offen:</label>
                                          <input type="text" class="form-control rowedit8" id="Offen" name="Offen" readonly/>
                                       </div>
                                    </div>
                                    <div class="form-row">
                                          <div class="form-group col-md-4">
                                          <label for="recipient-name" class="col-form-label">Upload Word document : <span id="worddoc"></span></label><input type="file" class="form-control " id="worddocument" name="worddocument" />
                                          </div>
                                          <div class="form-group col-md-4">
                                          <label for="recipient-name" class="col-form-label">Upload PDF File : <span id="pdfdoc"></span><button class="pdfrefresh" type="button" >Refresh</button></label><input type="file" class="form-control " id="uploadpdf" name="uploadpdf" accept="application/pdf" />
                                          </div>
                                          <div class="form-group col-md-4">
                                          <label for="recipient-name" class="col-form-label">Upload JPG File : <span id="jpgname"></span></label><input type="file" class="form-control " id="uploadjpg" name="uploadjpg" accept="image/*" />
                                          </div>
                                       </div>
                                       <!-- <div class="form-group col-md-4"><label for="recipient-name" class="col-form-label">Payment Method:</label><select class="form-select form-select-lg" id="payment_method" name="payment_method" ><option value="Unbekannt">Unbekannt</option><option value="Banküberweisung">Banküberweisung</option><option value="Bar">Bar</option><option value="Bar und Banküberweisung">Bar und Banküberweisung</option></select></div> -->
                                       <!-- <div class="form-group col-md-4"></div> -->
                                       <div class="form-row">
                                          <div class="form-group col-md-12">
                                             <label for="recipient-name" class="col-form-label">Notiz:</label>
                                             <p id="notizdata"></p>
                                             <textarea class="form-control " id="ckeditortxt1" name="notiz"></textarea>
                                          </div>
                                       </div>
                                       <button type="submit" class="btn btn-primary">Save</button>
                                       <img id="editformloader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
    width: 50px;
    height: 34px;
    display:none;
">
                                 </form>