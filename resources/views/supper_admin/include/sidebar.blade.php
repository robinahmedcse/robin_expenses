<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>


        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{URL::to('/dashboard')}}" target="_blank">dashboard </a></li>

                </ul>
            </li>

              <!-- <li><a><i class="fa fa-dropbox"></i>Balance Check<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                     <li><a href="{{URL::to('/dashboard/show/balance')}}">Balance</a></li>
                       
                </ul>
            </li> -->

             <li><a><i class="fa fa-amazon"></i>Cash in type <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                     <li><a href="{{URL::to('/dashboard/cash/in/type/add')}}" target="_blank">Add Cash in type</a></li>
                        <li><a href="{{URL::to('/dashboard/cash/in/type/manage')}}" target="_blank">Manage Cash in type</a></li>
                </ul>
            </li>
            
              <li><a><i class="fa fa-dollar"></i>Cash In<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                     <li><a href="{{URL::to('/dashboard/cash/in/add')}}" target="_blank" >Add Cash in</a></li>
                        <li><a href="{{URL::to('/dashboard/cash/in/manage')}}" target="_blank" >Manage Cash in</a></li>
                </ul>
             </li>
 


             <ul class="nav side-menu">
              <li><a><i class="fa fa-dollar"></i> Loan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                   
                   <li><a>Add Person<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="{{URL::to('/dashboard/loan/person/add')}}" target="_blank" >Add person</a></li>
                          <li><a href="{{URL::to('/dashboard/loan/person/manage')}}" target="_blank">Manage person</a></li>
                      </ul>
                    </li>


                    <li><a>Loan In<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="{{URL::to('/dashboard/loan/in/add')}}" target="_blank">Add Loan In</a></li>
                          <li><a href="{{URL::to('/dashboard/loan/in/manage')}}" target="_blank">Manage Loan</a></li>
                      </ul>
                    </li>
                
                </ul>
              </li>                  
            </ul>


            
            
            <li><a><i class="fa fa-eye-slash"></i>Exp. category <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                     <li><a href="{{URL::to('dashboard/exp/category/add')}}" target="_blank">Add exp. category</a></li>
                        <li><a href="{{URL::to('dashboard/exp/category/manage')}}" target="_blank">Manage exp. category</a></li>
                </ul>
            </li>
            
               <li><a><i class="fa fa-eyedropper"></i>Exp. Item<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                     <li><a href="{{URL::to('dashboard/exp/item/add')}}" target="_blank">Add Item</a></li>
                        <li><a href="{{URL::to('dashboard/exp/item/manage')}}">Manage Item</a></li>
                </ul>
            </li>
            
                 <li><a><i class="fa fa-globe"></i>Daily Exp.<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                     <li><a href="{{URL::to('/dashboard/daily/exp/add')}}" target="_blank">Add Daily Exp</a></li>
                        <li><a href="{{URL::to('/dashboard/daily/exp/manage')}}" target="_blank">Manage Daily Exp</a></li>
                </ul>
            </li>
            
        </ul>
    </div>


    <div class="menu_section">
                <!-- <h3>Live On</h3> -->
                <ul class="nav side-menu">

                  <li><a><i class="fa fa-sitemap"></i> Report <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
       
                        <li><a>Cash In Report <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu">
                              <a href="{{URL::to('/dashboard/report/cash/in/date/waise')}}" target="_blank">Date Waise</a>
                            </li>
                            <li>
                              <a href="{{URL::to('/dashboard/report/cash/in/category/waise')}}" target="_blank">Category Waise</a>
                            </li>
                            <li>
                              <!-- <a href="{{URL::to('/dashboard/report/cash/in/loan/waise')}}" target="_blank">Loan Waise</a> -->
                            </li>
                          </ul>
                        </li>
                       
                        <li><a>Exp. Report<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Date Waise </a>
                            </li>
                            <li><a href="#level2_1" target="_blank">Category Waise</a>
                            </li>
                            <li><a href="#level2_2" target="_blank">Item Waise</a>
                            </li>
                          </ul>
                        </li>

                      
                    </ul>
                  </li>                  
               </ul>
              </div>

</div>