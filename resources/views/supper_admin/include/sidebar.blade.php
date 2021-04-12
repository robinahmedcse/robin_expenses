<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>


        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{URL::to('/dashboard')}}">dashboard </a></li>

                </ul>
            </li>

              <li><a><i class="fa fa-dropbox"></i>Balance Check<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                     <li><a href="{{URL::to('/dashboard/show/balance')}}">Balance</a></li>
                       
                </ul>
            </li>

             <li><a><i class="fa fa-amazon"></i>Cash in type <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                     <li><a href="{{URL::to('/dashboard/cash/in/type/add')}}">Add Cash in type</a></li>
                        <li><a href="{{URL::to('/dashboard/cash/in/type/manage')}}">Manage Cash in type</a></li>
                </ul>
            </li>
            
              <li><a><i class="fa fa-dollar"></i>Cash In<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                     <li><a href="{{URL::to('/dashboard/cash/in/add')}}">Add Cash in</a></li>
                        <li><a href="{{URL::to('/dashboard/cash/in/manage')}}">Manage Cash in</a></li>
                </ul>
             </li>
            
            
            <li><a><i class="fa fa-eye-slash"></i>Exp. category <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                     <li><a href="{{URL::to('dashboard/exp/category/add')}}">Add exp. category</a></li>
                        <li><a href="{{URL::to('dashboard/exp/category/manage')}}">Manage exp. category</a></li>
                </ul>
            </li>
            
               <li><a><i class="fa fa-eyedropper"></i>Exp. Item<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                     <li><a href="{{URL::to('dashboard/exp/item/add')}}">Add Item</a></li>
                        <li><a href="{{URL::to('dashboard/exp/item/manage')}}">Manage Item</a></li>
                </ul>
            </li>
            
                 <li><a><i class="fa fa-globe"></i>Daily Exp.<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                     <li><a href="{{URL::to('/dashboard/daily/exp/add')}}">Add Daily Exp</a></li>
                        <li><a href="{{URL::to('/dashboard/daily/exp/manage')}}">Manage Daily Exp</a></li>
                </ul>
            </li>
            
        </ul>
    </div>


    <div class="menu_section">
                <!-- <h3>Live On</h3> -->
                <ul class="nav side-menu">

                  <li><a><i class="fa fa-sitemap"></i> Report <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <!-- <li><a href="#level1_1">Level One</a>
                        -->
                        <li><a>Cash In Report <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="{{URL::to('/dashboard/report/cash/in/date/waise')}}">Date Waise</a>
                            </li>
                            <li><a href="{{URL::to('/dashboard/report/cash/in/category/waise')}}">Category Waise</a>
                            </li>
                            <li><a href="{{URL::to('/dashboard/report/cash/in/loan/waise')}}">Loan Waise</a>
                            </li>
                          </ul>
                        </li>
                       
                        <li><a>Exp. Report<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Date Waise </a>
                            </li>
                            <li><a href="#level2_1">Category Waise</a>
                            </li>
                            <li><a href="#level2_2">Item Waise</a>
                            </li>
                          </ul>
                        </li>

                      
                    </ul>
                  </li>                  
               </ul>
              </div>

</div>