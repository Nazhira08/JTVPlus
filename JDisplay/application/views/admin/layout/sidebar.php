<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

 <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="">JMMC</a>
                        <a href="" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="" class="profile-mini">
                            <img src="<?= base_url(); ?>assets/photo/<?=$this->session->userdata('username') ?>.jpg" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="<?= base_url(); ?>assets/photo/<?=$this->session->userdata('username') ?>.jpg" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?=$this->session->userdata('display_name') ?></div>
                            </div>
                            <!--
                            <div class="profile-controls">
                                <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                            </div> -->
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Navigation</li>
                     <?php if($id_menu=="dashboard"){?><li class="active"><?php } else {?><li><?php }?>
                        <a href=<?= site_url("dashboard")?>><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                     </li> 
                      <?php foreach ($menu->result() as $row) 
                        { 
                          if(menu_tree_jum($row->id)==0) 
                          { 
                            ?>
                              <?php if($id_menu==$row->id){?><li class="xn-title"><?php } else {?><li><?php }?>
                                <a href="<?= site_url($row->site); ?>" title="<?php echo $row->nama; ?>">
                                  <span class="<?=$row->icon?>"></span>
                                  <span class="xn-title"></span>
                                  <?php echo $row->nama; ?>
                                </a>
                              </li>
                          <?php
                          }
                        else
                          {
                              ?>
                              <?php if(id_menu_tree($id_menu)==$row->id){?><li class="xn-openable active"><?php } else {?><li class="xn-openable"><?php }?>
                              <?php
                              echo "<a href=\"".site_url($row->site)." \">";
                              echo "<span class=\"".$row->icon."\"></span>";
                              echo "<span class=\"xn-title\"></span>".$row->nama."</a>";
                              echo "<ul>";
                              foreach (menu_tree($row->id)->result() as $row2) {
                               ?>
                                <?php if($id_menu==$row2->id){?><li class="active"><?php } else {?><li><?php }?>
                                <a href="<?= site_url($row2->site); ?>"><span class="<?=$row2->icon?>"></span>
                                <?php echo $row2->nama; ?></a></li>  
                              <?php }?>
                              </ul>
                            </li>
                            <?php 
                            }
                          }?>

                        <?php foreach ($menu_default->result() as $row) { ?>
                        <?php if($id_menu==$row->id){?><li class="active"><?php } else {?><li><?php }?>
                          <a href="<?= site_url($row->site); ?>">
                            <span class="<?=$row->icon?>"></span>
                            <span class="xn-title"></span>
                            <?php echo $row->nama; ?>
                          </a>
                         <!--  <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-pencil"></i> Tambah Data Akta</a></li>  
                          </ul> -->
                        </li>
                        <?php 
                        }?>
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
