<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="webroot\img\user.png" width="48" height="48" alt="User"/>
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
            <div class="email">john.doe@example.com</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <div class="icon">
                        <i class="material-icons col-indigo">portrait</i>
                    </div>
                    <span>Users</span>
                </a>

                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>

                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <div class="icon">
                        <i class="material-icons col-purple">work_outline</i>
                    </div>
                    <span>Companies</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Branches</span>
                        </a>
                        <ul class="ml-menu">
                            <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Departments</span>
                        </a>
                        <ul class="ml-menu">
                            <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>

                        </ul>
                    </li>
                </ul>

            </li>


            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <div class="icon">
                        <i class="material-icons col-purple">work_outline</i>
                    </div>
                    <span>Employees</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('List Employees'), ['action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__('New Employee'), ['action' => 'add']) ?> </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <div class="icon">
                        <i class="material-icons col-purple">store</i>
                    </div>
                    <span>Branches</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Branch'), ['action' => 'add']) ?></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <div class="icon">
                        <i class="material-icons col-purple">work_outline</i>
                    </div>
                    <span>Departments</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Department'), ['action' => 'add']) ?></li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <div class="icon">
                        <i class="material-icons col-purple">nature_people</i>
                    </div>
                    <span>Roles</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">swap_calls</i>
                    <span>Permissions</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?></li>
                    <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?></li>

                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <div class="icon">
                        <i class="material-icons col-indigo">face</i>
                    </div>
                    <span>Users</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Accounts</span>
                        </a>
                        <ul class="ml-menu">
                            <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Contacts</span>
                        </a>
                        <ul class="ml-menu">
                            <li><?= $this->Html->link(__('List Contacts'), ['controller' => 'Contacts', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Contact'), ['controller' => 'Contacts', 'action' => 'add']) ?></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Emergency Contacts(Kins)</span>
                        </a>
                        <ul class="ml-menu">
                            <li><?= $this->Html->link(__('List Kins'), ['controller' => 'Kins', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Kin'), ['controller' => 'Kins', 'action' => 'add']) ?></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Passwords</span>
                        </a>
                        <ul class="ml-menu">
                            <li><?= $this->Html->link(__('List Passwords'), ['controller' => 'Passwords', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Password'), ['controller' => 'Passwords', 'action' => 'add']) ?></li>

                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <div class="icon">
                        <i class="material-icons col-orange">how_to_reg</i>
                    </div>
                    <span>Clients</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">swap_calls</i>
                    <span>Properties</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <div class="icon">
                                <i class="material-icons col-purple">grid_on</i>
                            </div>
                            <span>Units/Rooms</span>
                        </a>
                        <ul class="ml-menu">
                            <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?></li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <div class="icon">
                        <i class="material-icons col-green">payment</i>
                    </div>
                    <span>Rent Payments</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('List Rents'), ['controller' => 'Rents', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Rent'), ['controller' => 'Rents', 'action' => 'add']) ?></li>

                </ul>

            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <div class="icon">
                        <i class="material-icons col-purple">wc</i>
                    </div>
                    <span>Tenants</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('List Tenants'), ['controller' => 'Tenants', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Tenant'), ['controller' => 'Tenants', 'action' => 'add']) ?></li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Rent/tenancy</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Rent Payments</span>
                                </a>
                                <ul class="ml-menu">
                                    <li><?= $this->Html->link(__('List Rents'), ['controller' => 'Rents', 'action' => 'index']) ?></li>
                                    <li><?= $this->Html->link(__('New Rent'), ['controller' => 'Rents', 'action' => 'add']) ?></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Monthly payments</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Security Deposits</span>
                        </a>
                        <ul class="ml-menu">
                            <li><?= $this->Html->link(__('List Securities'), ['controller' => 'Securities', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Security'), ['controller' => 'Securities', 'action' => 'add']) ?></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Penalties</span>
                        </a>
                        <ul class="ml-menu">
                            <li><?= $this->Html->link(__('List Penalties'), ['controller' => 'Penalties', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Penalty'), ['controller' => 'Penalties', 'action' => 'add']) ?></li>

                        </ul>
                    </li>

                </ul>

            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">swap_calls</i>
                    <span>Expenses & Requisitions</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Requisitions</span>
                        </a>
                        <ul class="ml-menu">
                            <li><?= $this->Html->link(__('List Requisitions'), ['controller' => 'Requisitions', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Requisition'), ['controller' => 'Requisitions', 'action' => 'add']) ?></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Expenses</span>
                        </a>
                        <ul class="ml-menu">
                            <li><?= $this->Html->link(__('List Expenses'), ['action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Expense'), ['action' => 'add']) ?></li>

                        </ul>
                    </li>
                </ul>

            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <div class="icon">
                        <i class="material-icons col-grey">account_balance</i>
                    </div>
                    <span>Banking & Deposits</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Deposits</span>
                        </a>
                        <ul class="ml-menu">
                            <li><?= $this->Html->link(__('List Deposits'), ['controller' => 'Deposits', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Deposit'), ['controller' => 'Deposits', 'action' => 'add']) ?></li>

                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <div class="icon">
                        <i class="material-icons col-yellow">power</i>
                    </div>
                    <span>Utilities</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('List Utilities'), ['controller' => 'Utilities', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Utility'), ['controller' => 'Utilities', 'action' => 'add']) ?></li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Bills</span>
                        </a>
                        <ul class="ml-menu">
                            <li><?= $this->Html->link(__('List Bills'), ['action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Bill'), ['action' => 'add']) ?></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Payments</span>
                        </a>
                        <ul class="ml-menu">
                            <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?></li>

                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <div class="icon">
                        <i class="material-icons col-red">lock</i>
                    </div>
                    <span>Confiscations</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('List Confiscations'), ['controller' => 'Confiscations', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Confiscation'), ['controller' => 'Confiscations', 'action' => 'add']) ?></li>
                </ul>

            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <div class="icon">
                        <i class="material-icons col-orange">build</i>
                    </div>
                    <span>Property Repairs & Damages</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('List Damages'), ['controller' => 'Damages', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Damage'), ['controller' => 'Damages', 'action' => 'add']) ?></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <div class="icon">
                        <i class="material-icons col-purple">transfer_with</i>
                    </div>
                    <span>Evictions</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('List Evictions'), ['controller' => 'Evictions', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Eviction'), ['controller' => 'Evictions', 'action' => 'add']) ?></li>
                </ul>

            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">swap_calls</i>
                    <span>Refunds</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('List Refunds'), ['controller' => 'Refunds', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('New Refund'), ['controller' => 'Refunds', 'action' => 'add']) ?></li>
                </ul>

            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">swap_calls</i>
                    <span>Exceptions</span>
                </a>
                <ul class="ml-menu">
                    <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Contacts</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Exceptions</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Messages</span>
                                </a>
                            <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>

                            </li>
                        </ul>
                    </li>
                </ul>

            </li>

            <li>
                <a href="javascript:void(0);">
                    <i class="material-icons col-light-blue">donut_large</i>
                    <span>Information</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2016 - 2017 <a href="javascript:void(0);">Estate manager</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs tab-nav-right" role="tablist">
        <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
        <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
            <ul class="demo-choose-skin">
                <li data-theme="red" class="active">
                    <div class="red"></div>
                    <span>Red</span>
                </li>
                <li data-theme="pink">
                    <div class="pink"></div>
                    <span>Pink</span>
                </li>
                <li data-theme="purple">
                    <div class="purple"></div>
                    <span>Purple</span>
                </li>
                <li data-theme="deep-purple">
                    <div class="deep-purple"></div>
                    <span>Deep Purple</span>
                </li>
                <li data-theme="indigo">
                    <div class="indigo"></div>
                    <span>Indigo</span>
                </li>
                <li data-theme="blue">
                    <div class="blue"></div>
                    <span>Blue</span>
                </li>
                <li data-theme="light-blue">
                    <div class="light-blue"></div>
                    <span>Light Blue</span>
                </li>
                <li data-theme="cyan">
                    <div class="cyan"></div>
                    <span>Cyan</span>
                </li>
                <li data-theme="teal">
                    <div class="teal"></div>
                    <span>Teal</span>
                </li>
                <li data-theme="green">
                    <div class="green"></div>
                    <span>Green</span>
                </li>
                <li data-theme="light-green">
                    <div class="light-green"></div>
                    <span>Light Green</span>
                </li>
                <li data-theme="lime">
                    <div class="lime"></div>
                    <span>Lime</span>
                </li>
                <li data-theme="yellow">
                    <div class="yellow"></div>
                    <span>Yellow</span>
                </li>
                <li data-theme="amber">
                    <div class="amber"></div>
                    <span>Amber</span>
                </li>
                <li data-theme="orange">
                    <div class="orange"></div>
                    <span>Orange</span>
                </li>
                <li data-theme="deep-orange">
                    <div class="deep-orange"></div>
                    <span>Deep Orange</span>
                </li>
                <li data-theme="brown">
                    <div class="brown"></div>
                    <span>Brown</span>
                </li>
                <li data-theme="grey">
                    <div class="grey"></div>
                    <span>Grey</span>
                </li>
                <li data-theme="blue-grey">
                    <div class="blue-grey"></div>
                    <span>Blue Grey</span>
                </li>
                <li data-theme="black">
                    <div class="black"></div>
                    <span>Black</span>
                </li>
            </ul>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="settings">
            <div class="demo-settings">
                <p>GENERAL SETTINGS</p>
                <ul class="setting-list">
                    <li>
                        <span>Report Panel Usage</span>
                        <div class="switch">
                            <label><input type="checkbox" checked><span class="lever"></span></label>
                        </div>
                    </li>
                    <li>
                        <span>Email Redirect</span>
                        <div class="switch">
                            <label><input type="checkbox"><span class="lever"></span></label>
                        </div>
                    </li>
                </ul>
                <p>SYSTEM SETTINGS</p>
                <ul class="setting-list">
                    <li>
                        <span>Notifications</span>
                        <div class="switch">
                            <label><input type="checkbox" checked><span class="lever"></span></label>
                        </div>
                    </li>
                    <li>
                        <span>Auto Updates</span>
                        <div class="switch">
                            <label><input type="checkbox" checked><span class="lever"></span></label>
                        </div>
                    </li>
                </ul>
                <p>ACCOUNT SETTINGS</p>
                <ul class="setting-list">
                    <li>
                        <span>Offline</span>
                        <div class="switch">
                            <label><input type="checkbox"><span class="lever"></span></label>
                        </div>
                    </li>
                    <li>
                        <span>Location Permission</span>
                        <div class="switch">
                            <label><input type="checkbox" checked><span class="lever"></span></label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
<!-- #END# Right Sidebar -->
