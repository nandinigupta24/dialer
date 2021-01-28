<div class="" id="LeadPanelSection">
    <input type="hidden" name="list_id" id="list_id" value="" />
    <input type="hidden" name="entry_list_id" id="entry_list_id" value="" />
    <input type="hidden" name="list_name" id="list_name" value="" />
    <input type="hidden" name="list_description" id="list_description" value="" />
    <input type="hidden" name="called_count" id="called_count" value="" />
    <input type="hidden" name="rank" id="rank" value="" />
    <input type="hidden" name="owner" id="owner" value="" />
    <input type="hidden" name="gmt_offset_now" id="gmt_offset_now" value="" />
    <input type="hidden" name="gender" id="gender" value="" />
    <input type="hidden" name="date_of_birth" id="date_of_birth" value="" />
    <input type="hidden" name="country_code" id="country_code" value="" />
    <input type="hidden" name="uniqueid" id="uniqueid" value="" />
    <input type="hidden" name="callserverip" id="callserverip" value="" />
    <input type="hidden" name="SecondS" id="SecondS" value="" />
    <input type="hidden" name="email_row_id" id="email_row_id" value="" />
    <input type="hidden" name="chat_id" id="chat_id" value="" />
    <input type="hidden" name="customer_chat_id" id="customer_chat_id" value="" />
    <input type="hidden" name="phone_code" id="phone_code" value="" />
    <input type="hidden" name="middle_initial" id="middle_initial" value="" />
    <input type="hidden" name="province" id="state12" value="" />
    <input type="hidden" name="security_phrase" id="security_phrase" value="" />
    <div class="row" style="margin:10px 0;">
        <div class="col-md-12" id="PreviewDialSetting">

        </div>
    </div>
    <!--    <div class="row">
            <div class="col-sm-6 text-left">
                <div class="form-group">
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-search"></i>
                        </div>
                        <input type="text" class="form-control pull-right" placeholder="Search" >
                    </div>
                     /.input group
                </div>
            </div>

            <div class="col-sm-6 text-right">
                <div class="form-group form-row">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker1">
                    </div>
                     /.input group

                </div>
            </div>
        </div>-->

    <div class="form-group">
        <div class="row mb-10 CustomFieldsDiv">

            </div>
        <div class="row mb-10">
            <div class="col-6">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control"  placeholder="Title" name="title" id="title"/>
                </div>
            </div>

            <div class="col-6">
                    <!-- Date mm/dd/yyyy -->
                    <div class="form-group">
                        <label for="lead_id">Lead ID:</label>
                        <input type="text" class="form-control"  placeholder="" value="" name="lead_id" id="lead_id"/>
                    </div>
                    <!-- /.input group -->
            </div>
        </div>

        <!--Main Customer Information-->
        <div class="form-group">



            <div class="row mb-10">
                <div class="col-6">

                    <?php
                    if ($label_first_name == '---HIDE---') {
                        echo "&nbsp; <input type=\"hidden\" name=\"first_name\" id=\"first_name\" value=\"\" />";
                    } else {
                        $first_name_readonly = '';
                        if (preg_match("/---READONLY---/", $label_first_name)) {
                            $first_name_readonly = 'readonly="readonly"';
                            $label_first_name = preg_replace("/---READONLY---/", "", $label_first_name);
                        } else {
                            if (preg_match("/---REQUIRED---/", $label_first_name)) {
                                $required_fields .= "first_name|";
                                $label_first_name = preg_replace("/---REQUIRED---/", "", $label_first_name);
                            }
                        }
//                                    echo "&nbsp; $label_first_name: <input type=\"text\" size=\"17\" name=\"first_name\" id=\"first_name\" maxlength=\"$MAXfirst_name\" class=\"cust_form\" value=\"\" $first_name_readonly />";
                        ?>
                        <div class="form-group">
                            <label for="first_name">First Name:</label>
                            <input type="text" class="form-control cust_form" size="17" name="first_name"  id="first_name" maxlength="<?php echo $MAXfirst_name; ?>" value="<?php echo $first_name_readonly; ?>" placeholder='<?php echo $label_first_name; ?>'/>
                        </div>
                        <?php
                    }
                    ?>

                    <!-- /.input group -->
                </div>
                <div class="col-6">
                    <?php
                    if ($label_last_name == '---HIDE---') {
                        echo "&nbsp; <input type=\"hidden\" name=\"last_name\" id=\"last_name\" value=\"\" />";
                    } else {
                        $last_name_readonly = '';
                        if (preg_match("/---READONLY---/", $label_last_name)) {
                            $last_name_readonly = 'readonly="readonly"';
                            $label_last_name = preg_replace("/---READONLY---/", "", $label_last_name);
                        } else {
                            if (preg_match("/---REQUIRED---/", $label_last_name)) {
                                $required_fields .= "last_name|";
                                $label_last_name = preg_replace("/---REQUIRED---/", "", $label_last_name);
                            }
                        }
//                                    echo "&nbsp; $label_last_name: <input type=\"text\" size=\"23\" name=\"last_name\" id=\"last_name\" maxlength=\"$MAXlast_name\" class=\"cust_form\" value=\"\" $last_name_readonly />";
                        ?>
                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input type="text" class="form-control cust_form" placeholder="<?php echo $label_last_name; ?>" size="23" name="last_name" id="last_name" maxlength="<?php echo $MAXlast_name; ?>"  value="<?php echo $last_name_readonly; ?>" />
                        </div>
                    <?php }
                    ?>

                    <!-- /.input group -->
                </div>
            </div>

            <div class="row mb-10">
                <div class="col-6">

                    <?php
                    if ($label_address1 == '---HIDE---') {
                        echo "<input type=\"hidden\" name=\"address1\" id=\"address1\" value=\"\" />";
                    } else {
                        $address1_readonly = '';
                        if (preg_match("/---READONLY---/", $label_address1)) {
                            $address1_readonly = 'readonly="readonly"';
                            $label_address1 = preg_replace("/---READONLY---/", "", $label_address1);
                        } else {
                            if (preg_match("/---REQUIRED---/", $label_address1)) {
                                $required_fields .= "address1|";
                                $label_address1 = preg_replace("/---REQUIRED---/", "", $label_address1);
                            }
                        }
//                                    echo "$label_address1: </td><td align=\"left\" colspan=5><font class=\"body_text\"><input type=\"text\" size=\"85\" name=\"address1\" id=\"address1\" maxlength=\"$MAXaddress1\" class=\"cust_form\" value=\"\" $address1_readonly />";
                        ?>
                        <div class="form-group">
                            <label for="address1">Address1:</label>
                            <input type="text" class="form-control" placeholder="<?php echo $label_address1; ?>" size="85" name="address1" id="address1" maxlength="<?php echo $MAXaddress1; ?>" value="" <?php echo $address1_readonly; ?>/>
                        </div>
                    <?php } ?>
                    <!-- /.input group -->
                </div>
                <div class="col-6">
                    <?php
//                    if ($label_phone_number == '---HIDE---') {
//                        echo "<input type=\"hidden\" name=\"phone_number\" id=\"phone_number\" value=\"\" />";
//                    } else {
////                                    echo "$label_phone_number: </td><td align=\"left\"><font class=\"body_text\">";
//                        if ((preg_match('/Y/', $disable_alter_custphone)) or ( preg_match('/HIDE/', $disable_alter_custphone))) {
//                            echo "<font class=\"body_text\"><span id=\"phone_numberDISP\"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span></font>";
//                            echo "<input type=\"hidden\" name=\"phone_number\" id=\"phone_number\" value=\"\" />";
//                        } else {
////                                        echo "<input type=\"text\" size=\"20\" name=\"phone_number\" id=\"phone_number\" maxlength=\"$MAXphone_number\" class=\"cust_form\" value=\"\" />";
                    ?>
                    <div class="form-group">
                        <label for="phone_number">Phone Number:</label>
                        <?php if($hide_phone == 'Y') { ?>
                          <input type="hidden" class="form-control cust_form" placeholder="<?php echo $label_phone_number; ?>" size="20" name="phone_number" id="phone_number" maxlength="<?php echo $MAXphone_number; ?>" value=""/>
                          <input type="text" class="form-control cust_form" placeholder="<?php echo $label_phone_number; ?>" size="20" name="phone_number1" id="phone_number1" maxlength="<?php echo $MAXphone_number; ?>" value=""/>
                        <?php } else { ?>
                        <input type="hidden" class="form-control cust_form" placeholder="<?php echo $label_phone_number; ?>" size="20" name="phone_number1" id="phone_number1" maxlength="<?php echo $MAXphone_number; ?>" value=""/>
                        <input type="text" class="form-control cust_form" placeholder="<?php echo $label_phone_number; ?>" size="20" name="phone_number" id="phone_number" maxlength="<?php echo $MAXphone_number; ?>" value=""/>
                      <?php } ?>
                    </div>
                    <?php
//    }
//}
                    ?>

                    <!-- /.input group -->
                </div>
            </div>

            <div class="row mb-10">
                <div class="col-6">
                    <?php
                    if ($label_address2 == '---HIDE---') {
                        echo "<input type=\"hidden\" name=\"address2\" id=\"address2\" value=\"\" />";
                    } else {
                        $address2_readonly = '';
                        if (preg_match("/---READONLY---/", $label_address2)) {
                            $address2_readonly = 'readonly="readonly"';
                            $label_address2 = preg_replace("/---READONLY---/", "", $label_address2);
                        } else {
                            if (preg_match("/---REQUIRED---/", $label_address2)) {
                                $required_fields .= "address2|";
                                $label_address2 = preg_replace("/---REQUIRED---/", "", $label_address2);
                            }
                        }
//                                    echo "$label_address1: </td><td align=\"left\" colspan=5><font class=\"body_text\"><input type=\"text\" size=\"85\" name=\"address1\" id=\"address1\" maxlength=\"$MAXaddress1\" class=\"cust_form\" value=\"\" $address1_readonly />";
                        ?>
                        <div class="form-group">
                            <label for="address2">Address2:</label>
                            <input type="text" class="form-control" placeholder="<?php echo $label_address2; ?>" size="85" name="address2" id="address2" maxlength="<?php echo $MAXaddress2; ?>" value="" <?php echo $address2_readonly; ?>/>
                        </div>
                    <?php } ?>
                    <!-- /.input group -->
                </div>
                <div class="col-6">
                    <?php
                    if ($label_alt_phone == '---HIDE---') {
                        echo " </td><td align=\"left\"><input type=\"hidden\" name=\"alt_phone\" id=\"alt_phone\" value=\"\" />";
                    } else {
                        $alt_phone_readonly = '';
                        if (preg_match("/---READONLY---/", $label_alt_phone)) {
                            $alt_phone_readonly = 'readonly="readonly"';
                            $label_alt_phone = preg_replace("/---READONLY---/", "", $label_alt_phone);
                        } else {
                            if (preg_match("/---REQUIRED---/", $label_alt_phone)) {
                                $required_fields .= "alt_phone|";
                                $label_alt_phone = preg_replace("/---REQUIRED---/", "", $label_alt_phone);
                            }
                        }
//                                    echo "$label_alt_phone: </td><td align=\"left\"><font class=\"body_text\"><input type=\"text\" size=\"14\" name=\"alt_phone\" id=\"alt_phone\" maxlength=\"$MAXalt_phone\" class=\"cust_form\" value=\"\" $alt_phone_readonly />";
                        ?>
                        <div class="form-group">
                            <label for="alt_phone">Alternate Phone Number:</label>
                            <input type="text" class="form-control" placeholder="<?php echo $label_alt_phone; ?>"  size="14" name="alt_phone" id="alt_phone" maxlength="<?php echo $MAXalt_phone; ?>" class="cust_form" value="" <?php echo $alt_phone_readonly; ?>/>
                        </div>
                    <?php }
                    ?>

                    <!-- /.input group -->
                </div>
            </div>

            <div class="row mb-10">
                <div class="col-6">
                    <?php
                    if ($label_address3 == '---HIDE---') {
                        echo "<input type=\"hidden\" name=\"address3\" id=\"address3\" value=\"\" />";
                    } else {
                        $address3_readonly = '';
                        if (preg_match("/---READONLY---/", $label_address3)) {
                            $address3_readonly = 'readonly="readonly"';
                            $label_address3 = preg_replace("/---READONLY---/", "", $label_address3);
                        } else {
                            if (preg_match("/---REQUIRED---/", $label_address3)) {
                                $required_fields .= "address3|";
                                $label_address3 = preg_replace("/---REQUIRED---/", "", $label_address3);
                            }
                        }
//                                    echo "$label_address1: </td><td align=\"left\" colspan=5><font class=\"body_text\"><input type=\"text\" size=\"85\" name=\"address1\" id=\"address1\" maxlength=\"$MAXaddress1\" class=\"cust_form\" value=\"\" $address1_readonly />";
                        ?>
                        <div class="form-group">
                            <label for="address3">Address3:</label>
                            <input type="text" class="form-control" placeholder="<?php echo $label_address3; ?>" size="85" name="address3" id="address3" maxlength="<?php echo $MAXaddress3; ?>" value="" <?php echo $address3_readonly; ?>/>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-6">

                    <?php
                    if ($label_email == '---HIDE---') {
                        echo " </td><td align=\"left\" colspan=\"3\"><input type=\"hidden\" name=\"email\" id=\"email\" value=\"\" />";
                    } else {
                        $email_readonly = '';
                        if (preg_match("/---READONLY---/", $label_email)) {
                            $email_readonly = 'readonly="readonly"';
                            $label_email = preg_replace("/---READONLY---/", "", $label_email);
                        } else {
                            if (preg_match("/---REQUIRED---/", $label_email)) {
                                $required_fields .= "email|";
                                $label_email = preg_replace("/---REQUIRED---/", "", $label_email);
                            }
                        }
//                                    echo "$label_email: </td><td align=\"left\" colspan=\"3\"><font class=\"body_text\"><input type=\"text\" size=\"45\" name=\"email\" id=\"email\" maxlength=\"$MAXemail\" class=\"cust_form\" value=\"\" $email_readonly />";
                        ?>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" placeholder="<?php echo $label_email; ?>" size="45" name="email" id="email" maxlength="<?php echo $MAXemail; ?>"  value="" <?php echo $email_readonly; ?>/>
                        </div>
                    <?php }
                    ?>
                    <!-- /.input group -->
                </div>
            </div>

            <div class="row mb-10">
                <div class="col-6">
                    <?php
                    if ($label_city == '---HIDE---') {
                        echo " </td><td align=\"left\"><input type=\"hidden\" name=\"city\" id=\"city\" value=\"\" />";
                    } else {
                        $city_readonly = '';
                        if (preg_match("/---READONLY---/", $label_city)) {
                            $city_readonly = 'readonly="readonly"';
                            $label_city = preg_replace("/---READONLY---/", "", $label_city);
                        } else {
                            if (preg_match("/---REQUIRED---/", $label_city)) {
                                $required_fields .= "city|";
                                $label_city = preg_replace("/---REQUIRED---/", "", $label_city);
                            }
                        }
//                                    echo "$label_city: </td><td align=\"left\"><font class=\"body_text\"><input type=\"text\" size=\"20\" name=\"city\" id=\"city\" maxlength=\"$MAXcity\" class=\"cust_form\" value=\"\" $city_readonly />";
                        ?>
                        <div class="form-group">
                            <label for="city">City:</label>
                            <input type="text" class="form-control cust_form" placeholder="<?php echo $label_city; ?>" size="20" name="city" id="city" maxlength="<?php echo $MAXcity; ?>" value="" <?php echo $city_readonly; ?> />
                        </div>
                        <?php
                    }
                    ?>

                    <!-- /.input group -->
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="datepicker">Date:</label>
                        <input type="text" autocomplete="off" class="form-control pull-right" id="datepicker">
                    </div>
                    <!-- /.input group -->
                </div>
            </div>
<div class="row mb-10">
                <div class="col-6">
                    <?php
                    if ($label_state == '---HIDE---') {
                        echo " </td><td align=\"left\"><input type=\"hidden\" name=\"state\" id=\"state\" value=\"\" />";
                    } else {
                        $postal_code_readonly = '';
                        if (preg_match("/---READONLY---/", $label_state)) {
                            $postal_code_readonly = 'readonly="readonly"';
                            $label_state = preg_replace("/---READONLY---/", "", $label_state);
                        } else {
                            if (preg_match("/---REQUIRED---/", $label_state)) {
                                $required_fields .= "state|";
                                $label_state = preg_replace("/---REQUIRED---/", "", $label_state);
                            }
                        }
//                                    echo "$label_postal_code: </td><td align=\"left\"><font class=\"body_text\"><input type=\"text\" size=\"14\" name=\"postal_code\" id=\"postal_code\" maxlength=\"$MAXpostal_code\" class=\"cust_form\" value=\"\" $postal_code_readonly />";
                        ?>
                        <div class="form-group">
                            <label for="state">State:</label>
                            <input type="text" class="form-control cust_form" placeholder="<?php echo $label_state; ?>" size=\"14\" name="state" id="state" value="" <?php echo $postal_code_readonly; ?>/>
                        </div>
                    <?php }
                    ?>
                </div>
                <div class="col-6">
                    <?php
                    if ($label_postal_code == '---HIDE---') {
                        echo " </td><td align=\"left\"><input type=\"hidden\" name=\"postal_code\" id=\"postal_code\" value=\"\" />";
                    } else {
                        $postal_code_readonly = '';
                        if (preg_match("/---READONLY---/", $label_postal_code)) {
                            $postal_code_readonly = 'readonly="readonly"';
                            $label_postal_code = preg_replace("/---READONLY---/", "", $label_postal_code);
                        } else {
                            if (preg_match("/---REQUIRED---/", $label_postal_code)) {
                                $required_fields .= "postal_code|";
                                $label_postal_code = preg_replace("/---REQUIRED---/", "", $label_postal_code);
                            }
                        }
//                                    echo "$label_postal_code: </td><td align=\"left\"><font class=\"body_text\"><input type=\"text\" size=\"14\" name=\"postal_code\" id=\"postal_code\" maxlength=\"$MAXpostal_code\" class=\"cust_form\" value=\"\" $postal_code_readonly />";
                        ?>
                        <div class="form-group">
                            <label for="postal_code">Postal Code:</label>
                            <input type="text" class="form-control cust_form" placeholder="<?php echo $label_postal_code; ?>" size=\"14\" name="postal_code" id="postal_code" maxlength="<?php echo $MAXpostal_code; ?>"value="" <?php echo $postal_code_readonly; ?>/>
                        </div>
                    <?php }
                    ?>


                    <!-- /.input group -->
                </div>
            </div>
            <div class="row mb-10">

                <div class="col-6">
                    <?php
                    if ($label_gender == '---HIDE---') {
                        echo "<span id=\"GENDERhideFORie\"><input type=\"hidden\" name=\"gender_list\" id=\"gender_list\" value=\"\" /></span>";
                    } else {
                        ?>

                        <div class="form-group" id="GENDERhideFORie">
                            <label for="gender_list">Gender:</label>
                            <select class="form-control" name="gender_list" id="gender_list">
                                <option value="U"><?php echo _QXZ("U - Undefined"); ?></option>
                                <option value="M"><?php echo _QXZ("M - Male"); ?></option>
                                <option value="F"><?php echo _QXZ("F - Female"); ?></option>
                            </select>
                        </div>
                        <?php
//		echo "<span id=\"GENDERhideFORie\"><select size=\"1\" name=\"gender_list\" class=\"cust_form\" id=\"gender_list\"><option value=\"U\">"._QXZ("U - Undefined")."</option><option value=\"M\">"._QXZ("M - Male")."</option><option value=\"F\">"._QXZ("F - Female")."</option></select></span>";
                    }
                    ?>
                </div>
                <div class="col-6">
                    <?php
                    if ($label_vendor_lead_code == '---HIDE---') {
                        echo " </td><td align=\"left\"><input type=\"hidden\" name=\"vendor_lead_code\" id=\"vendor_lead_code\" value=\"\" />";
                    } else {
                        $vendor_lead_code_readonly = '';
                        if (preg_match("/---READONLY---/", $label_vendor_lead_code)) {
                            $vendor_lead_code_readonly = 'readonly="readonly"';
                            $label_vendor_lead_code = preg_replace("/---READONLY---/", "", $label_vendor_lead_code);
                        } else {
                            if (preg_match("/---REQUIRED---/", $label_vendor_lead_code)) {
                                $required_fields .= "vendor_lead_code|";
                                $label_vendor_lead_code = preg_replace("/---REQUIRED---/", "", $label_vendor_lead_code);
                            }
                        }
//                                    echo "$label_vendor_lead_code: </td><td align=\"left\"><font class=\"body_text\"><input type=\"text\" size=\"15\" name=\"vendor_lead_code\" id=\"vendor_lead_code\" maxlength=\"$MAXvendor_lead_code\" class=\"cust_form\" value=\"\" $vendor_lead_code_readonly />";
                        ?>
                        <div class="form-group">
                            <label for="vendor_lead_code">Vendor Lead Code:</label>
                            <input type="text" class="form-control" placeholder="<?php echo $label_vendor_lead_code; ?>" size="15" name="vendor_lead_code" id="vendor_lead_code" maxlength="<?php echo $MAXvendor_lead_code; ?>" value="" <?php echo $vendor_lead_code_readonly; ?>/>
                        </div>
                    <?php }
                    ?>


                    <!-- /.input group -->
                </div>
            </div>

            <div class="row mb-10">

                <div class="col-6">
                    <div class="form-group">
                        <label for="source_id">Source Id:</label>
                        <input type="text" class="form-control" placeholder="Source Id" id="source_id">
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="col-6">
                    <?php
                    if ($label_comments == '---HIDE---') {
                        echo "<input type=\"hidden\" name=\"comments\" id=\"comments\" value=\"\" />\n";
                        echo "<input type=\"hidden\" name=\"other_tab_comments\" id=\"other_tab_comments\" value=\"\" />\n";
                        echo "<input type=\"hidden\" name=\"dispo_comments\" id=\"dispo_comments\" value=\"\" />\n";
                        echo "<input type=\"hidden\" name=\"callback_comments\" id=\"callback_comments\" value=\"\" />\n";
                        echo "<span id='viewcommentsdisplay'><input type='button' id='ViewCommentButton' onClick=\"ViewComments('ON','','','YES')\" value='-" . _QXZ("History") . "-'/></span>\n";
                        echo "<span id='otherviewcommentsdisplay'><input type='button' id='OtherViewCommentButton' onClick=\"ViewComments('ON','','','YES')\" value='-" . _QXZ("History") . "-'/></span>\n";
                    } else {
//
                        if (($multi_line_comments)) {
                            ?>
                            <div class="form-group">
                                <label for="comments">Comments:</label>
                                <textarea name="comments" id="comments" class="form-control cust_form_text" placeholder="<?php echo $label_comments; ?>"></textarea>
                                <span id='viewcommentsdisplay'><input type='button' id='ViewCommentButton' onClick=\"ViewComments('ON','','','YES')\" value='-"._QXZ("History")."-'/></span>
                            </div>
                            <?php
//                                        echo "<textarea name=\"comments\" id=\"comments\" rows=\"2\" cols=\"85\" class=\"cust_form_text\" value=\"\"></textarea>\n";
                        } else {
                            ?>
                            <div class="form-group">
                                <label for="comments">Comments:</label>
                                <input name="comments" id="comments" class="form-control cust_form_text" placeholder="<?php echo $label_comments; ?>"/>
                                <span id='viewcommentsdisplay'><input type='button' id='ViewCommentButton' onClick=\"ViewComments('ON','','','YES')\" value='-"._QXZ("History")."-'/></span>
                            </div>
                            <?php
                        }
                    }
                    ?>

                    <!-- /.input group -->
                </div>
            </div>

            <div class="row mb-10">

                <div class="col-6">
                    <?php
                    if (strlen($agent_display_fields) > 3) {
                        echo "</td></tr><tr><td align=\"left\" colspan=\"5\"><font class=\"body_text\">";

                        if (preg_match("/entry_date/", $agent_display_fields)) {
                            echo _QXZ("Entry Date") . ": &nbsp; <font class=\"body_text\"><span id=\"entry_dateDISP\"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span> &nbsp; </font>";
                        }
                        if (preg_match("/source_id/", $agent_display_fields)) {
                            echo _QXZ("Source ID") . ": &nbsp; <font class=\"body_text\"><span id=\"source_idDISP\"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span> &nbsp; </font>";
                        }
                        if (preg_match("/date_of_birth/", $agent_display_fields)) {
                            echo _QXZ("Date of Birth") . ": &nbsp; <font class=\"body_text\"><span id=\"date_of_birthDISP\"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span> &nbsp; </font>";
                        }
                        if (preg_match("/rank/", $agent_display_fields)) {
                            echo _QXZ("Rank") . ": &nbsp; <font class=\"body_text\"><span id=\"rankDISP\"> &nbsp; &nbsp; </span> &nbsp; </font>";
                        }
                        if (preg_match("/owner/", $agent_display_fields)) {
                            echo _QXZ("Owner") . ": &nbsp; <font class=\"body_text\"><span id=\"ownerDISP\"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span> &nbsp; </font>";
                        }
                        if (preg_match("/last_local_call_time/", $agent_display_fields)) {
                            echo _QXZ("Last Call") . ": &nbsp; <font class=\"body_text\"><span id=\"last_local_call_timeDISP\"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span> &nbsp; </font>";
                        }
                    }
                    if ($per_call_notes == 'ENABLED') {
                        echo _QXZ("Call Notes: ");
                        if ($agent_call_log_view == '1') {
                            echo "<br /><span id=\"CallNotesButtons\"><a href=\"#\" onclick=\"VieWNotesLoG();return false;\">" . _QXZ("view notes") . "</a></span> ";
                        }
                        echo "</td><td align=\"left\" colspan=\"5\"><font class=\"body_text\">";
                        echo "<textarea name=\"call_notes\" id=\"call_notes\" rows=\"2\" cols=\"85\" class=\"cust_form_text\" value=\"\"></textarea>\n";
                    } else {
                        echo " </td><td align=\"left\" colspan=5><input type=\"hidden\" name=\"call_notes\" id=\"call_notes\" value=\"\" /><span id=\"CallNotesButtons\"></span>\n";
                    }

                    echo "<input type=\"hidden\" name=\"required_fields\" id=\"required_fields\" value=\"$required_fields\" />\n";
                    ?>

                </div>
            </div>


<!--            <div class="row mb-10 CustomFieldsDivOLD">

            </div>-->
        </div>

    </div>

</div>
