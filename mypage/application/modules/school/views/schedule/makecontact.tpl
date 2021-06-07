<!DOCTYPE HTML>
<html lang="ja">
<head>
  <base href="{$base}">
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="{$base}/mypage/themes/css/user.css" media="all" />
  <link rel="stylesheet" type="text/css" href="{$base}/mypage/themes/css/common.css" media="all" />
  <title>{$title}</title>
</head>

<body>
    <div id="window-container">
        <h2 class="text-center"><span class="text-bold text-under span-center">CLIENT CONTACT SHEET</span><br /></h2>
        <table border="1" class="agreement table-center">
            <tbody>
                <tr>
                    <td><span class="item-name">First Name: </span></td>
                    <td><span class="item-value">{$basic_info.0}</span></td>
                    <td><span class="item-name">Last Name: </span></td>
                    <td><span class="item-value">{$basic_info.1}</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Email Address: </span></td>
                    <td><span class="item-value">{$email_info.0}</span></td>
                    <td><span class="item-name">Call Phone # {$country}: </span></td>
                    <td><span class="item-value">{$addr_info.0}</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Home Address: </span></td>
                    <td colspan="3"><span class="item-value">{$addr_info.1} {$addr_info.2} {$addr_info.3} {$addr_info.4}</span></td>
                </tr>
                <tr>
                    <td colspan="4"><span class="text-bold text-under">INSURANCE</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Provider Name: </span></td>
                    <td colspan="3"><span class="item-value">{$insurance_info.provider_name_english}</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Policy No.: </span></td>
                    <td colspan="3"><span class="item-value">{$insurance_info.policy_number}</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Policy Period: </span></td>
                    <td colspan="3"><span class="item-value">From {$insurance_info.insured_date_st|date_format:"%G/%m/%d"} To {$insurance_info.insured_date_ed|date_format:"%G/%m/%d"}</span></td>
                </tr>
                <tr>
                    <td colspan="4"><span class="text-bold text-under">VISA</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Visa Type: </span></td>
                    <td colspan="3"><span class="item-value">{$visa_info.visa_type_english}</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Visa No.: </span></td>
                    <td colspan="3"><span class="item-value">{$visa_info.visa_number}</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Arrival Date: </span></td>
                    <td><span class="item-value">{$visa_info.arrival_date|date_format:"%G/%m/%d"}</span></td>
                    <td><span class="item-name">Visa Expiry Date: </span></td>
                    <td><span class="item-value">{$visa_info.visa_expiry_date|date_format:"%G/%m/%d"}</span></td>
                </tr>
                <tr>
                    <td><span class="item-name">Emergency Contact: </span></td>
                    <td><span class="item-value">{$emergency_info.0}</span></td>
                    <td><span class="item-name">Passport No.: </span></td>
                    <td><span class="item-value">{$visa_info.passport_number}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>