<!doctype html>
<html lang="en-US">

<head>

    <!-- Meta -->
    <meta charset="UTF-8">
    <title>Documentation | CryptFence</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <meta name="theme-color" content="#1E78FF">
    <meta name="msapplication-navbutton-color" content="#1E78FF">
    <meta name="apple-mobile-web-app-status-bar-style" content="#1E78FF">
    <link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/icon.png">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shCore.css') }}">\docs
    <link rel="stylesheet" href="{{ asset('css/shThemeDefault.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleDocs.css') }}">

</head>

<body>

    <!-- Header -->
    <div id="header">
        <span><b>CryptFence | Could Licensing System | Documentation</b></span>&nbsp;&nbsp;&nbsp;
        <a href="{{ url('') }}" class="btn-one ripple-btn"><b>&#8249; Home</b></a>
        <a href="{{ url('dashboard') }}" class="btn-one ripple-btn"><b>Dashboard &#8250</b></a>
    </div>

    <!-- Menu -->
    <div id="doc-menu">
        <ul class="nav">
            <span><a href="{{ url('docs') }}">Direct API Requests</a></span>
            <li class="section active"><a href="#gettingstarted">Getting Started</a></li>
            <li class="section"><a href="#register">Register Devices</a></li>
            <li class="section"><a href="#verify">Verify Licenses</a></li>
            <li class="section"><a href="#unsubscribe">Unsubscribe Licenses</a></li>
            <br><span><a href="{{ url('docs/csharp') }}">C# Library &#187;</a></span>
        </ul>
    </div>

    <!-- Content -->
    <div id="doc-content" data-spy="scroll" data-target="#menu">

        <div id="intro">
            <div class="vertical">
                <h1>CryptFence API Documentation <span>v1.1</span></h1>
                <h2>Welcome to the best cloud license management system!</h2><br>
                <p>First of all, thank you for selecting the <code>CryptFence</code> license management system. You can
                    find the
                    detailed information about the API system in this documentation. If there is anything you cannot
                    find in
                    this document, you can contact us via <a href="{{ url('contact') }}">contact page</a>.</p>
            </div>
        </div>

        <!-- ===================================================================================-->

        <h1 id="gettingstarted" style="text-transform: uppercase;">Getting Started</h1>
        <p><strong>CryptFence</strong> is a modern &amp; secure cloud based license management system. You can connect
            your custom applications to <strong>CryptFence</strong> platform using this API system.<br>
            This API allows you to:
            <ul>
                <li>Register new devices into applications</li>
                <li>Verifiy serial keys and devices</li>
                <li>Unsubscribe licenses from devices</li>
            </ul>
            <br>

            You <strong>MUST</strong> refer these guidelines when implementing this API with your custom application.
            <ul>
                <li>Verify if the user inputs are in UTF-8 encoding (specially <code>Serial Keys</code>).</li>
                <li>Use the correct <code>public_key</code> and <code>product_id</code> when sending requests. We do not
                    store public keys in our end because of security reasons. So make sure to keep the public key
                    securely. You will receive it as an email while creating a product.</li>
                <li>Encode <code>payload</code> parameter using Base64 before sending it to CryptFence API.</li>
                <li>Store offline license files <strong>only if necessary</strong>. If you are using offline licenses:
                    <ol>
                        <li>Save offline license in the first run.</li>
                        <li>Check the expiration date in each run.</li>
                        <li>After a certain time (3 days recommended), prompt user to input the serial key again to
                            validate (<strong>MUST</strong>). User will need to connect with internet.</li>
                        <li>Never allow offline licenses to stay forever. You should code your script to delete them
                            after a time and revalidate Serial Keys.</li>
                    </ol>
                </li>
                <li>Use NTP server or GPS to calculate the current time. Never use device/system time to validate the
                    expiration dates.</li>
                <li>Check the <code>status</code> & <code>message</code> JSON values in the each responce. If there any
                    problem, a short description will be there in <code>message</code> key.</li>
                <li>When sending requests:
                    <ol>
                        <li>First send <code>/verify</code> request. The system will automatically verify the log in, if
                            the device already have an active license.</li>
                        <li>If it fails, let user to input their serial key. You can use <code>/register</code> endpoint
                            to verify and register the device. Make sure to show the relavent error message according to
                            the JSON responce.</li>
                    </ol>
                </li>
                <li>To unsubscribe a device, you can use <code>/unsubscribe</code> endpoint.</li>
                <li>All API endpoints are rate-limited to prevent from abusing. Maximum 15 requests/minute.</li>
            </ul>
            <br>
            If something wrong, don't worry. We got your back. Please <a href="{{ url('contact') }}"> contact</a> us.
            Good luck!
        </p>


        <!-- ===================================================================================-->

        <h1 id="register" style="text-transform: uppercase;"><span>1</span>Register Devices</h1>
        <p>The <code>/register</code> endpoint uses HTTP <code>POST</code> method and it requires two parameters.</p>

        <table>
            <tr>
                <th colspan="4">Request parameters</th>
            </tr>
            <tr>
                <td colspan="4">https://cryptfence.com/api/register <code>POST</code></td>
            </tr>
            <tr>
                <th>Parameter</th>
                <th>Required</th>
                <th>Type</th>
                <th>Description</th>
            </tr>
            <tr>
                <td>product_id</td>
                <td>True</td>
                <td>string</td>
                <td>The ID of the product. Check your email to find the product ID.</td>
            </tr>
            <tr>
                <td>payload</td>
                <td>True</td>
                <td>string</td>
                <td>Please refer below notes to build the payload.</td>
            </tr>
        </table>

        <br>

        <ul>
            <li>To build the <code>payload</code>,
                <ol>
                    <li>Create a JSON in this format. <br>
                        <pre>
    { version = "version here", hwid = "HWID here", serial = "serial key from use input", operating_system = "operating system" }
</pre>

                    </li>
                    <li>Encrypt the payload using RSA (with the given public key). You can use <a
                            href="https://www.openssl.org/" target="_blank">OpenSSL</a> library for this
                        (openssl_private_encrypt).</li>
                    <li>Now encode the RSA cipher using Base64.</li>
                    <li>Then you can use that Base64 encoded text as the <code>payload</code> parameter.</li>
                </ol>
            </li>
            <li>The responce will formatted in JSON format and it will contain two keys as <code>status</code> &
                <code>message</code>.</li>
        </ul>

        <table>
            <tr>
                <th colspan="4">Response</th>
            </tr>
            <tr>
                <th>HTTP Code</th>
                <th>Status</th>
                <th>Message</th>
            </tr>
            <tr>
                <td>200</td>
                <td>error</td>
                <td>missing_info</td>
            </tr>
            <tr>
                <td>200</td>
                <td>error</td>
                <td>associated_product_is_not_available</td>
            </tr>
            <tr>
                <td>200</td>
                <td>error</td>
                <td>associated_key_is_not_available</td>
            </tr>
            <tr>
                <td>200</td>
                <td>error</td>
                <td>associated_customer_is_not_available</td>
            </tr>
            <tr>
                <td>200</td>
                <td>error</td>
                <td>hwid_already_registered</td>
            </tr>
            <tr>
                <td>200</td>
                <td>error</td>
                <td>key_is_blocked</td>
            </tr>
            <tr>
                <td>200</td>
                <td>error</td>
                <td>key_expired</td>
            </tr>
            <tr>
                <td>200</td>
                <td>error</td>
                <td>maximum_devices_limit_reached</td>
            </tr>
            <tr>
                <td>200</td>
                <td>success</td>
                <td>device_registered</td>
            </tr>

        </table>

        <!-- ===================================================================================-->

        <h1 id="verify" style="text-transform: uppercase;"><span>2</span>Verify Licenses</h1>
        <p>The <code>/verify</code> endpoint uses HTTP <code>POST</code> method and it requires two parameters.</p>

        <table>
            <tr>
                <th colspan="4">Request parameters</th>
            </tr>
            <tr>
                <td colspan="4">https://cryptfence.com/api/verify <code>POST</code></td>
            </tr>
            <tr>
                <th>Parameter</th>
                <th>Required</th>
                <th>Type</th>
                <th>Description</th>
            </tr>
            <tr>
                <td>product_id</td>
                <td>True</td>
                <td>string</td>
                <td>The ID of the product. Check your email to find the product ID.</td>
            </tr>
            <tr>
                <td>payload</td>
                <td>True</td>
                <td>string</td>
                <td>Please refer below notes to build the payload.</td>
            </tr>
        </table>

        <br>

        <ul>
            <li>To build the <code>payload</code>,
                <ol>
                    <li>Create a JSON in this format. <br>
                        <pre>
{ version = "version here", hwid = "HWID here"}
</pre>

                    </li>
                    <li>Encrypt the payload using RSA (with the given public key). You can use <a
                            href="https://www.openssl.org/" target="_blank">OpenSSL</a> library for this
                        (openssl_private_encrypt).</li>
                    <li>Now encode the RSA cipher using Base64.</li>
                    <li>Then you can use that Base64 encoded text as the <code>payload</code> parameter.</li>
                </ol>
            </li>
            <li>The responce will formatted in JSON format and it will contain two keys as <code>status</code> &
                <code>message</code>.
                <table>
                    <tr>
                        <th colspan="4">Response</th>
                    </tr>
                    <tr>
                        <th>HTTP Code</th>
                        <th>Status</th>
                        <th>Message</th>
                    </tr>
                    <tr>
                        <td>200</td>
                        <td>error</td>
                        <td>missing_info</td>
                    </tr>
                    <tr>
                        <td>200</td>
                        <td>error</td>
                        <td>associated_product_is_not_available</td>
                    </tr>
                    <tr>
                        <td>200</td>
                        <td>error</td>
                        <td>hwid_not_registered_on_the_system</td>
                    </tr>
                    <tr>
                        <td>200</td>
                        <td>error</td>
                        <td>associated_key_is_not_available</td>
                    </tr>
                    <tr>
                        <td>200</td>
                        <td>error</td>
                        <td>associated_customer_is_not_available</td>
                    </tr>
                    <tr>
                        <td>200</td>
                        <td>error</td>
                        <td>latest_version_is_required</td>
                    </tr>
                    <tr>
                        <td>200</td>
                        <td>error</td>
                        <td>key_is_blocked</td>
                    </tr>
                    <tr>
                        <td>200</td>
                        <td>error</td>
                        <td>key_expired</td>
                    </tr>
                    <tr>
                        <td>200</td>
                        <td>success</td>
                        <td>A Base64 encoded key (Ex: Q3J5cHRGZW5jZSBpcyB0aGUgYmVz...)</td>
                    </tr>
                </table>
            </li><br>
            <li>You can write the responce <code>message</code> into a file and use it as a offline license. Make sure
                to revalidate licence using <code>/verify</code> endpoint in each 3 days (or more frequent).</li>
        </ul>

        <!-- ===================================================================================-->

        <h1 id="unsubscribe" style="text-transform: uppercase;"><span>2</span>Unsubscribe Licenses</h1>
        <p>The <code>/unsubscribe</code> endpoint uses HTTP <code>POST</code> method and it requires two
            parameters.<br>You can implement this endpoint if you like to offer your customers to migrate licenses to
            other devices.</p>
        <table>
            <tr>
                <th colspan="4">Request parameters</th>
            </tr>
            <tr>
                <td colspan="4">https://cryptfence.com/api/unsubscribe <code>POST</code></td>
            </tr>
            <tr>
                <th>Parameter</th>
                <th>Required</th>
                <th>Type</th>
                <th>Description</th>
            </tr>
            <tr>
                <td>product_id</td>
                <td>True</td>
                <td>string</td>
                <td>The ID of the product. Check your email to find the product ID.</td>
            </tr>
            <tr>
                <td>payload</td>
                <td>True</td>
                <td>string</td>
                <td>Please refer below notes to build the payload.</td>
            </tr>
        </table>

        <br>

        <ul>
            <li>To build the <code>payload</code>,
                <ol>
                    <li>Create a JSON in this format. <br>
                        <pre>
{ version = "version here", hwid = "HWID here"}
</pre>

                    </li>
                    <li>Encrypt the payload using RSA (with the given public key). You can use <a
                            href="https://www.openssl.org/" target="_blank">OpenSSL</a> library for this
                        (openssl_private_encrypt).</li>
                    <li>Now encode the RSA cipher using Base64.</li>
                    <li>Then you can use that Base64 encoded text as the <code>payload</code> parameter.</li>
                </ol>
            </li>
            <li>The responce will formatted in JSON format and it will contain two keys as <code>status</code> &
                <code>message</code>.
                <table>
                    <tr>
                        <th colspan="4">Response</th>
                    </tr>
                    <tr>
                        <th>HTTP Code</th>
                        <th>Status</th>
                        <th>Message</th>
                    </tr>
                    <tr>
                        <td>200</td>
                        <td>error</td>
                        <td>missing_info</td>
                    </tr>
                    <tr>
                        <td>200</td>
                        <td>error</td>
                        <td>associated_product_is_not_available</td>
                    </tr>
                    <tr>
                        <td>200</td>
                        <td>error</td>
                        <td>hwid_not_registered</td>
                    </tr>
                    <tr>
                        <td>200</td>
                        <td>success</td>
                        <td>successfully_unsubscribed</td>
                    </tr>
                </table>
            </li><br>
            <li>You can write the responce <code>message</code> into a file and use it as a offline license. Make sure
                to revalidate licence using <code>/verify</code> endpoint in each 3 days (or more frequent).</li>
        </ul>

        <p>Please <a href="{{ url('contact') }}"> contact</a> us if you need help with implementation.</p>
    </div>

    <!-- JavaScripts -->
    <script type='text/javascript' src='{{ asset('js/jquery.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/bootstrap.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/jquery.scrollTo.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/jquery.localscroll-1.2.7-min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/shCore.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/shBrushPhp.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/shBrushXML.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/shBrushJScript.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/shBrushCss.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/custom.js') }}'></script>

</body>

</html>
