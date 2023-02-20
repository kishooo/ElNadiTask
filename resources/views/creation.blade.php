<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

    
    <link herf="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <title>Document</title>
    
    

</head>

  <!-- ***** Header Area End ***** -->

  <div class="contact-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-lg-6">
                <div id="map">
                  
                </div>
              </div>
              <div class="col-lg-6 align-self-center">
                <h2>create student</h2>
                <form id="contact" action="/createStudent" method="post">
                @csrf
                  <div class="row">
                                    <div class="col-lg-6">
                      
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="name" name="name"  id="name" placeholder="Name" autocomplete="on" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="email" name="email"  id="email" placeholder="email" autocomplete="on" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="level" name="level"  id="level" placeholder="level"  required>
                      </fieldset>
                    </div>


                    </div>
                    <div class="col-lg-10"> 
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button "><i class="fa fa-paper-plane"></i>submit</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
              <div class="row">
              <div class="col-lg-6">
                <div id="map">
                  
                </div>
              </div>
              <h2>create course</h2>
              <div class="col-lg-6 align-self-center">
                <form id="contact" action="/createCourse" method="post">
                @csrf
                  <div class="row">
                  <!--<div class="form-group">
														<label for="exampleInputFile">صورة المنتج</label>
														<input name="image" type="file" id="exampleInputFile">
									</div> -->
                                    <div class="col-lg-6">
                      
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="name" name="name"  id="name" placeholder="Name" autocomplete="on" required>
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="Description" name="Description"  id="Description" placeholder="Description"  required>
                      </fieldset>
                    </div>

                    

                    </div>
                    <div class="col-lg-10"> 
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button "><i class="fa fa-paper-plane"></i>submit</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
              <div class="row">
              <div class="col-lg-6">
                <div id="map">
                  
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



</body>

</html>
