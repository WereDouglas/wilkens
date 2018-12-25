<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <?php

            if ($this->session->read('image') == "") {
                ?>
                <img src="<?= $this->Url->image('user.png'); ?>" width="auto" height="100" alt="User"/>
                <?php
            } else {
                ?>
                <img src="<?= $this->Url->build($this->session->read('image')); ?>" width="auto" height="100"
                     alt="photo"/>  <?php
            }
            ?>
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true"
                 aria-expanded="false"><?= $this->session->read('contact'); ?></div>
            <div class="email"><?= $this->session->read('user_type'); ?> : <?= $this->session->read('name'); ?> </div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><i class="material-icons">person</i><?= $this->Html->link(__('Profile'),
                            ['controller' => 'Users', 'action' => 'view', $this->session->read('id')]) ?></li>

                    <li role="separator" class="divider"></li>
                    <li>
                        <i class="material-icons"></i><?= $this->Html->link('Sign Out', '/users/logout',
                            ['class' => '']); ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>


            <?php if ($this->session->read('user_type') == "Client") { ?>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <div class="icon">
                            <i class="material-icons col-green">style</i>
                        </div>
                        <span>Rent Payments</span>
                    </a>
                    <ul class="ml-menu">

                        <li><?= $this->Html->link(__('Rent'), ['controller' => 'Clients', 'action' => 'rent']) ?></li>


                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">payment</i>
                        <span>Expenses & Requisitions</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('List Requisitions'),
                                ['controller' => 'Requisitions', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('Advanced'),
                                ['controller' => 'Expenses', 'action' => 'expense']) ?></li>


                    </ul>

                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <div class="icon">
                            <i class="material-icons col-purple">view_list</i>
                        </div>
                        <span>Reports</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('Financial Report'),
                                ['controller' => 'Rents', 'action' => 'original']) ?></li>

                        <li><?= $this->Html->link(__('Expenses'),
                                ['controller' => 'Rents', 'action' => 'expense']) ?></li>


                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <div class="icon">
                            <i class="material-icons col-pink">lock</i>
                        </div>
                        <span>Installments</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('List'),
                                ['controller' => 'Installments', 'action' => 'index']) ?></li>
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
                        <li><?= $this->Html->link(__('List Tenants'),
                                ['controller' => 'Tenants', 'action' => 'index']) ?></li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Rent/tenancy</span>
                            </a>

                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Security Deposits</span>
                            </a>
                            <ul class="ml-menu">
                                <li><?= $this->Html->link(__('List Securities'),
                                        ['controller' => 'Securities', 'action' => 'index']) ?></li>

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
                        <li><?= $this->Html->link(__('List Deposits'),
                                ['controller' => 'Deposits', 'action' => 'index']) ?></li>

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
                        <li><?= $this->Html->link(__('List Utilities'),
                                ['controller' => 'Utilities', 'action' => 'index']) ?></li>

                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Bills</span>
                            </a>
                            <ul class="ml-menu">
                                <li><?= $this->Html->link(__('List Bills'),
                                        ['controller' => 'Bills', 'action' => 'index']) ?></li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Payments</span>
                            </a>
                            <ul class="ml-menu">
                                <li><?= $this->Html->link(__('List Payments'),
                                        ['controller' => 'Payments', 'action' => 'index']) ?></li>

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
                        <li><?= $this->Html->link(__('List Confiscations'),
                                ['controller' => 'Confiscations', 'action' => 'index']) ?></li>
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
                        <li><?= $this->Html->link(__('List Damages'),
                                ['controller' => 'Damages', 'action' => 'index']) ?></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">track_changes</i>
                        <span>Evictions</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('List Evictions'),
                                ['controller' => 'Evictions', 'action' => 'index']) ?></li>
                    </ul>

                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">remove_from_queues</i>
                        <span>Refunds</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('List Refunds'),
                                ['controller' => 'Refunds', 'action' => 'index']) ?></li>
                    </ul>

                </li>

            <?php } else { ?>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <div class="icon">
                            <i class="material-icons col-indigo">portrait</i>
                        </div>
                        <span>Users</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
                        <li><?= $this->Html->link(__('List Users'),
                                ['controller' => 'Users', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('Clients'),
                                ['controller' => 'Users', 'action' => 'client']) ?></li>
                        <li><?= $this->Html->link(__('Tenants'),
                                ['controller' => 'Users', 'action' => 'tenant']) ?></li>
                        <li><?= $this->Html->link(__('Employees'),
                                ['controller' => 'Users', 'action' => 'employee']) ?></li>

                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Accounts</span>
                            </a>
                            <ul class="ml-menu">
                                <li><?= $this->Html->link(__('List Accounts'),
                                        ['controller' => 'Accounts', 'action' => 'index']) ?></li>
                                <li><?= $this->Html->link(__('New Account'),
                                        ['controller' => 'Accounts', 'action' => 'add']) ?></li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Contacts</span>
                            </a>
                            <ul class="ml-menu">
                                <li><?= $this->Html->link(__('List Contacts'),
                                        ['controller' => 'Contacts', 'action' => 'index']) ?></li>
                                <li><?= $this->Html->link(__('New Contact'),
                                        ['controller' => 'Contacts', 'action' => 'add']) ?></li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Emergency Contacts(Kins)</span>
                            </a>
                            <ul class="ml-menu">
                                <li><?= $this->Html->link(__('List Kins'),
                                        ['controller' => 'Kins', 'action' => 'index']) ?></li>
                                <li><?= $this->Html->link(__('New Kin'),
                                        ['controller' => 'Kins', 'action' => 'add']) ?></li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <div class="icon">
                                    <i class="material-icons col-orange">fingerprint</i>
                                </div>
                                <span>Passwords</span>
                            </a>
                            <ul class="ml-menu">
                                <li><?= $this->Html->link(__('List Passwords'),
                                        ['controller' => 'Passwords', 'action' => 'index']) ?></li>
                                <li><?= $this->Html->link(__('New Password'),
                                        ['controller' => 'Passwords', 'action' => 'add']) ?></li>

                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <div class="icon">
                            <i class="material-icons col-green">style</i>
                        </div>
                        <span>Rent Payments</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('View by client'),
                                ['controller' => 'Rents', 'action' => 'client']) ?></li>
                        <li><?= $this->Html->link(__('Reports'),
                                ['controller' => 'Rents', 'action' => 'report']) ?></li>
                        <li><?= $this->Html->link(__('All  Rent Payments'),
                                ['controller' => 'Rents', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New Rent'), ['controller' => 'Rents', 'action' => 'add']) ?></li>


                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">payment</i>
                        <span>Expenses & Requisitions</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('List Requisitions'),
                                ['controller' => 'Requisitions', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New Requisition'), ['action' => 'add']) ?></li>
                        <li><?= $this->Html->link(__('Advanced'),
                                ['controller' => 'Expenses', 'action' => 'expense']) ?></li>

                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Requisitions</span>
                            </a>
                            <ul class="ml-menu">

                                <li><?= $this->Html->link(__('New Requisition'),
                                        ['controller' => 'Requisitions', 'action' => 'add']) ?></li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Expenses</span>
                            </a>
                            <ul class="ml-menu">
                                <li><?= $this->Html->link(__('List Expenses'),
                                        ['controller' => 'Expenses', 'action' => 'index']) ?></li>
                                <li><?= $this->Html->link(__('New Expense'),
                                        ['controller' => 'Expenses', 'action' => 'add']) ?></li>

                            </ul>
                        </li>
                    </ul>

                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <div class="icon">
                            <i class="material-icons col-purple">view_list</i>
                        </div>
                        <span>Reports</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('Original Financial Report'),
                                ['controller' => 'Rents', 'action' => 'original']) ?></li>
                        <li><?= $this->Html->link(__('Financial Report'),
                                ['controller' => 'Rents', 'action' => 'financial']) ?></li>

                        <li><?= $this->Html->link(__('Expenses'),
                                ['controller' => 'Rents', 'action' => 'expense']) ?></li>


                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <div class="icon">
                            <i class="material-icons col-orange">work_outline</i>
                        </div>
                        <span>Companies</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('List Companies'),
                                ['controller' => 'Companies', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New Company'),
                                ['controller' => 'Companies', 'action' => 'add']) ?></li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Branches</span>
                            </a>
                            <ul class="ml-menu">
                                <li><?= $this->Html->link(__('List Branches'),
                                        ['controller' => 'Branches', 'action' => 'index']) ?></li>
                                <li><?= $this->Html->link(__('New Branch'),
                                        ['controller' => 'Branches', 'action' => 'add']) ?></li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Departments</span>
                            </a>
                            <ul class="ml-menu">
                                <li><?= $this->Html->link(__('List Departments'),
                                        ['controller' => 'Departments', 'action' => 'index']) ?></li>
                                <li><?= $this->Html->link(__('New Department'),
                                        ['controller' => 'Departments', 'action' => 'add']) ?></li>

                            </ul>
                        </li>
                    </ul>

                </li>


                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <div class="icon">
                            <i class="material-icons radio-col-orange">group</i>
                        </div>
                        <span>Employees</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('List Employees'),
                                ['controller' => 'Employees', 'action' => 'index']) ?> </li>
                        <li><?= $this->Html->link(__('New Employee'),
                                ['controller' => 'Employees', 'action' => 'add']) ?> </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <div class="icon">
                            <i class="material-icons col-green">store</i>
                        </div>
                        <span>Branches</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('List Branches'),
                                ['controller' => 'Branches', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New Branch'),
                                ['controller' => 'Branches', 'action' => 'add']) ?></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <div class="icon">
                            <i class="material-icons col-blue">airline_seat_recline_normal</i>
                        </div>
                        <span>Departments</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('List Departments'),
                                ['controller' => 'Departments', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New Department'),
                                ['controller' => 'Departments', 'action' => 'add']) ?></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <div class="icon">
                            <i class="material-icons col-red">verified_user</i>
                        </div>
                        <span>Roles</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('List Roles'),
                                ['controller' => 'Roles', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">lock_open</i>
                        <span>Permissions</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('New Permission'),
                                ['controller' => 'Permissions', 'action' => 'add']) ?></li>
                        <li><?= $this->Html->link(__('List Permissions'),
                                ['controller' => 'Permissions', 'action' => 'index']) ?></li>

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
                        <li><?= $this->Html->link(__('List Clients'),
                                ['controller' => 'Clients', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New Client'),
                                ['controller' => 'Clients', 'action' => 'add']) ?></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">business</i>
                        <span>Properties</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('New Property'),
                                ['controller' => 'Properties', 'action' => 'add']) ?></li>
                        <li>
                        <li><?= $this->Html->link(__('List Properties'),
                                ['controller' => 'Properties', 'action' => 'index']) ?></li>

                        <a href="javascript:void(0);" class="menu-toggle">
                            <div class="icon">
                                <i class="material-icons col-purple">grid_on</i>
                            </div>
                            <span>Units/Rooms</span>
                        </a>
                        <ul class="ml-menu">
                            <li><?= $this->Html->link(__('List Units'),
                                    ['controller' => 'Units', 'action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('New Unit'),
                                    ['controller' => 'Units', 'action' => 'add']) ?></li>

                        </ul>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <div class="icon">
                            <i class="material-icons col-pink">lock</i>
                        </div>
                        <span>Installments</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('List'),
                                ['controller' => 'Installments', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New'),
                                ['controller' => 'Installments', 'action' => 'add']) ?></li>
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
                        <li><?= $this->Html->link(__('List Tenants'),
                                ['controller' => 'Tenants', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New Tenant'),
                                ['controller' => 'Tenants', 'action' => 'add']) ?></li>
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
                                        <li><?= $this->Html->link(__('List Rents'),
                                                ['controller' => 'Rents', 'action' => 'index']) ?></li>
                                        <li><?= $this->Html->link(__('New Rent'),
                                                ['controller' => 'Rents', 'action' => 'add']) ?></li>
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
                                <li><?= $this->Html->link(__('List Securities'),
                                        ['controller' => 'Securities', 'action' => 'index']) ?></li>
                                <li><?= $this->Html->link(__('New Security'),
                                        ['controller' => 'Securities', 'action' => 'add']) ?></li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Penalties</span>
                            </a>
                            <ul class="ml-menu">
                                <li><?= $this->Html->link(__('List Penalties'),
                                        ['controller' => 'Penalties', 'action' => 'index']) ?></li>
                                <li><?= $this->Html->link(__('New Penalty'),
                                        ['controller' => 'Penalties', 'action' => 'add']) ?></li>

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
                        <li><?= $this->Html->link(__('List Deposits'),
                                ['controller' => 'Deposits', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New Deposit'),
                                ['controller' => 'Deposits', 'action' => 'add']) ?></li>

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
                        <li><?= $this->Html->link(__('List Utilities'),
                                ['controller' => 'Utilities', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New Utility'),
                                ['controller' => 'Utilities', 'action' => 'add']) ?></li>

                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Bills</span>
                            </a>
                            <ul class="ml-menu">
                                <li><?= $this->Html->link(__('List Bills'),
                                        ['controller' => 'Bills', 'action' => 'index']) ?></li>
                                <li><?= $this->Html->link(__('New Bill'),
                                        ['controller' => 'Bills', 'action' => 'add']) ?></li>

                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <span>Payments</span>
                            </a>
                            <ul class="ml-menu">
                                <li><?= $this->Html->link(__('List Payments'),
                                        ['controller' => 'Payments', 'action' => 'index']) ?></li>
                                <li><?= $this->Html->link(__('New Payment'),
                                        ['controller' => 'Payments', 'action' => 'add']) ?></li>

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
                        <li><?= $this->Html->link(__('List Confiscations'),
                                ['controller' => 'Confiscations', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New Confiscation'),
                                ['controller' => 'Confiscations', 'action' => 'add']) ?></li>
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
                        <li><?= $this->Html->link(__('List Damages'),
                                ['controller' => 'Damages', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New Damage'),
                                ['controller' => 'Damages', 'action' => 'add']) ?></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">track_changes</i>
                        <span>Evictions</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('List Evictions'),
                                ['controller' => 'Evictions', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New Eviction'),
                                ['controller' => 'Evictions', 'action' => 'add']) ?></li>
                    </ul>

                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">remove_from_queues</i>
                        <span>Refunds</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('List Refunds'),
                                ['controller' => 'Refunds', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('New Refund'),
                                ['controller' => 'Refunds', 'action' => 'add']) ?></li>
                    </ul>

                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">bug_report</i>
                        <span>Logs</span>
                    </a>
                    <ul class="ml-menu">
                        <li><?= $this->Html->link(__('Logs'), ['controller' => 'Logs', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('Exceptions'),
                                ['controller' => 'Exceptions', 'action' => 'index']) ?></li>
                        <li><?= $this->Html->link(__('Messages'),
                                ['controller' => 'Messages', 'action' => 'index']) ?></li>


                    </ul>

                </li>

                <li>
                    <a href="javascript:void(0);">
                        <i class="material-icons col-light-blue">donut_large</i>
                        <span>Information</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; <?php echo date('Y') ?> <a href="javascript:void(0);">Estate manager</a>.
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
