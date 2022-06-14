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
    <link rel="icon" type="image/png" sizes="56x56" href="{{ asset('images/fav-icon/icon.png') }}">
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
            <span><a href="{{ url('docs') }}">Direct API Requests &#187;</a></span>
            <br><br><span><a href="{{ url('docs/csharp') }}">C# Library</a></span>
            <li class="section active"><a href="#general">General Info</a></li>
            <li class="section"><a href="#gettingstarted">Getting Started</a></li>
            <li class="section"><a href="#initiate">Initiate CryptFence Client</a></li>
            <li class="section"><a href="#register">Register Devices</a></li>
            <li class="section"><a href="#verify">Verify Licenses</a></li>
            <li class="section"><a href="#unsubscribe">Unsubscribe Licenses</a></li>
            <li class="section"><a href="#methods">Available Methods</a></li>
        </ul>
    </div>

    <!-- Content -->
    <div id="doc-content" data-spy="scroll" data-target="#menu">

        <div id="intro">
            <div class="vertical">
                <h1>CryptFence C# Library <span>v1.1</span></h1>
                <h2>A C# wrapper for CryptFence licenses!</h2><br>
                <p>You can
                    find the
                    detailed information about the CryptFenc C# library in this documentation.<br>If there is anything
                    you cannot
                    find in
                    this document, you can contact us via <a href="{{ url('contact') }}">contact page</a>.</p>
            </div>
        </div>

        <!-- ===================================================================================-->

        <h1 id="general" style="text-transform: uppercase;">General Info</h1>
        <p>
            You <strong>MUST</strong> refer these guidelines when implementing this library with your C# application.
            <ul>
                <li>Verify if the user inputs are in UTF-8 encoding (specially <code>Serial Keys</code>).</li>
                <li>Use the correct <code>public_key</code> and <code>product_id</code> when sending requests. We do not
                    store public keys in our end because of security reasons. So make sure to keep the public key
                    securely. You will receive it as an email while creating a product.</li>
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
                <li>Check the <code>status</code> & <code>message</code> JSON values in the each responce. If there any
                    problem, a short description will be there in <code>message</code> key.</li>
                <li>When sending requests:
                    <ol>
                        <li>First execute <code>VerifyFromAPI()</code> function. The system will automatically verify
                            the log in, if
                            the device already have an active license.</li>
                        <li>If it fails, let user to input their serial key. You can use <code>RegisterDevice()</code>
                            function
                            to verify and register the device. Make sure to show the relavent error message according to
                            the JSON responce.</li>
                    </ol>
                </li>
                <li>To unsubscribe a device, you can use <code>Unsubscribe()</code> function.</li>
                <li>All API endpoints are rate-limited to prevent from abusing. Maximum 15 requests/minute.</li>
            </ul>
            <div class="py-4 px-4 mb-2 mt-2 text-base font-bold" role="alert" style="background:#caffdf; padding: 20px;">
                🛈 Always make sure to obfuscate your codes before deploying. Check our <a href="https://github.com/NotPrab/.NET-Obfuscator/blob/master/README.md" target="_blank">recommendations</a> for C# obfuscators. 
            </div>
            <br>
            If something wrong, don't worry. We got your back. Please <a href="{{ url('contact') }}"> contact</a> us.
            Good luck!
        </p>

        <!-- ===================================================================================-->

        <h1 id="gettingstarted" style="text-transform: uppercase;">Getting Started</h1>
        <p>First, you will have to include the library into your C# project. Please download & extract the library set
            from the below link.<br>
            <a href="{{ url('downloads/cryptfence.csharp.zip') }}">Download CryptFence C# Library</a><br><br>
            This ZIP file contains four different DLL files. You need to include all these DLLs as
            <code>References</code>.
            <ul>
                <li>BouncyCastle.Crypto.dll</li>
                <li>Newtonsoft.Json.dll</li>
                <li>System.CodeDom.dll</li>
                <li>CryptFence.Net.dll</li>
            </ul>
        </p>
        <p>To add References:<br>
            Right click on your project on <strong>Solution Explorer</strong> > <strong>Add</strong> >
            <strong>Reference</strong> > <strong>Browse</strong> > Then select the extracted four DLL and click
            <strong>OK</strong> button.
            <br>Now you are ready to go.</p>

        <!-- ===================================================================================-->

        <h1 id="initiate" style="text-transform: uppercase;"><span>1</span>Initiate CryptFence Client</h1>
        <p>
            Please use the <code>InitiateClient()</code> function to initiate a CryptFence client. <br><br>
            Parameters
            <ul>
                <li>product_id</li>
                <li>version - as string</li>
                <li>HWID - there are few inbuilt HWID methods. Please refer the <a href="#methods"><strong>Available Methods</strong></a>
                    section for available methods.</li>
                <li>public_key - you received via an email while creating the product</li>
            </ul>
        </p>
        <script type="syntaxhighlighter" class="brush: php; html-script: true"><![CDATA[
            using CryptFence;

            CryptFence.Net.CryptFence CryptFence = null;

            private void button1_Click(object sender, EventArgs e)
            {
                CryptFence = new CryptFence.Net.CryptFence();
                CryptFence.InitiateClient("1001", "alpha 0.1 version, CryptFence.getHwid_CPU(), "LS0tLS1CRUdJTiBQVUJMSUMgS0VZLS0tLS0KTUlJQklqQU5CZ2txaGtpRzl3MEJBUUVGQUFPQ0FROEFNSUlCQ2dLQ0FRRUE0OEo3SHhCTm1RRzlkdXZzcjVldwpKT1dYblhvNFFWak85ckNaYTdFaDc3bFJZcHdWeXdzUms5UWhPSzNQRVhVcGF3cEVCL2dwVzBDeHBXZGZqUzRGCkFhYjhZT3hoZlBsY1czb0xGVzBlU3YzVGE5endpSjlUWXkrcGNEZ1NiSVNRYjBCQ2ZEWHN5RDk1WHB5VCtTSncKdnFUa2VuN2VENFpVU2RTam9xR2lBMTdPRFd3REplQXlrZ3NsQ2VFVzlhOTZ4MENxeXB2TEJUdWRRWEVvcjVpbgp4YmFlR2Y5N0ZlYXB2U0tTYWh6Q2VZMytobVEySm9COVJ2UHAreVRUZGRXTFY5cFRiSXBYL3R1U0kyNnNUYXBWCjdZVXFCSGVUd3FTT2E0b2UzRTFhenNYUFViZnJZQ2wzaWZRUU9qUWt2NEFPeTdrSjJ3QlY3NE80L1hqM016MzQKeFFJREFRQUIKLS0tLS1FTkQgUFVCTElDIEtFWS0tLS0tCg==");
            }
            ]]></script>


        <!-- ===================================================================================-->

        <h1 id="register" style="text-transform: uppercase;"><span>2</span>Register Devices</h1>
        <p>
            Please use the <code>RegisterDevice()</code> function to register a device. <br><br>
            Parameters
            <ul>
                <li>serial_key - which input by the user</li>
                <li>message - to get the output message</li>
            </ul>
        </p>
        <script type="syntaxhighlighter" class="brush: php; html-script: true"><![CDATA[
            private void button2_Click(object sender, EventArgs e)
            {
                string message = "";
                var success = CryptFence.RegisterDevice("UWFSI-CAU7P-7MOBJ-L8T80-Q8AMU", out message);
    
                if (success)
                {
                    // a valid license. Execute VerifyFromAPI() function now.
                }
                else
                {
                    MessageBox.Show(message); //show the error message
                }
            }
            ]]></script>


            <!-- ===================================================================================-->

            <h1 id="verify" style="text-transform: uppercase;"><span>3</span>Verify Licenses</h1>
            <p>
                Please use the <code>VerifyFromAPI()</code> function to verify a device. <br><br>
                Parameters
                <ul>
                    <li>save_local_license_file (bool) - If yes, the application will save an offline license as <code>license.lic</code> in application's directory. Use <code>VerifyLocalLicense()</code> function to validate offline licenses.</li>
                    <li>local_time - pass the local time to compare expire dates. Please refer the <a href="#methods"><strong>Available Methods</strong></a> for available options.</li>
                    <li>message - to get the output message</li>
                </ul>
            </p>
            <script type="syntaxhighlighter" class="brush: php; html-script: true"><![CDATA[
                private void button3_Click(object sender, EventArgs e)
                {
                    string message = "";
                    var success = CryptFence.VerifyFromAPI(false, CryptFence.getNetworkTime(), out message);
        
                    if (success)
                    {
                        // a valid license. Continue to the application
                    }
                    else
                    {
                        MessageBox.Show(message); //show the error message
                    }
                }
                ]]></script>

                
            <!-- ===================================================================================-->

            <h1 id="unsubscribe" style="text-transform: uppercase;"><span>4</span>Unsubscribe Licenses</h1>
            <p>
                Please use the <code>Unsubscribe()</code> function to unsubscribe a device. <br><br>
                Parameters
                <ul>
                    <li>message - to get the output</li>
                </ul>
            </p>
            <script type="syntaxhighlighter" class="brush: php; html-script: true"><![CDATA[
                private void button4_Click(object sender, EventArgs e)
                {
                    string message = "";
                    var success = CryptFence.Unsubscribe(out message);
        
                    if (success)
                    {
                        MessageBox.Show("Successfully unsubscribed."); //log out code
                    }
                    else
                    {
                        MessageBox.Show(message); //show the error message
                    }
                }
                ]]></script>
                
                
                <!-- ===================================================================================-->

            <h1 id="methods" style="text-transform: uppercase;"><span>5</span>Available Methods</h1>

            <h3>To get HWIDs.</h3>
            <p>
                There are six methods to get HWID.
                <ol>
                    <li><strong>getHwid_CPU()</strong> - Get CPU based HWID<pre>string HWID_str = CryptFence.getHwid_CPU();</pre></li><br>
                    <li><strong>getHwid_Bios()</strong> - Get BIOS based HWID<pre>string HWID_str = CryptFence.getHwid_Bios();</pre></li><br>
                    <li><strong>getHwid_Disk()</strong> - Get primary storage disk based HWID<pre>string HWID_str = CryptFence.getHwid_Disk();</pre></li><br>
                    <li><strong>getHwid_Motherboard()</strong> - Get motherboard based HWID<pre>string HWID_str = CryptFence.getHwid_Motherboard();</pre></li><br>
                    <li><strong>getHwid_GraphicCard()</strong> - Get primary GPU based HWID<pre>string HWID_str = CryptFence.getHwid_GraphicCard();</pre></li><br>
                    <li><strong>getHwid_NetworkMac()</strong> - Get network MAC address based HWID<pre>string HWID_str = CryptFence.getHwid_NetworkMac();</pre></li>
                </ol><br>
                You can also combine these methods and generate complx HWIDs. Please make sure to use the same HWID parsing method in all versions.<br>
                Example:
<pre style="margin-top: 0px;">
string HWID_str = CryptFence.getHwid_CPU() + CryptFence.getHwid_Motherboard();
</pre>
            </p>

            <h3>To get live time.</h3>
            <p>
                There are three methods to get the current time.
                <ol>
                    <li><strong>getSystemTime()</strong> - Get system/device time (<code>Not recommended</code>).
<pre>
DateTime current_time = CryptFence.getSystemTime();
</pre>
                    </li><br>
                    <li><strong>getNetworkTime()</strong> - Get time from NTP server. Internet required (<code>Highly recommended</code> for computer applications).
<pre>
DateTime current_time = CryptFence.getNetworkTime();
</pre>
                        </li><br>
                    <li><strong>getGPSTime()</strong> - Get time from a GPS device. No internet required. Recommended for mobile applications.
<pre>
int week = 550; //get from GPS sensor
double second = 8000; //get from GPS sensor
DateTime current_time = CryptFence.getGPSTime(week, second);
</pre>
                        </li><br>
                </ol>
            </p>

            <h3>To get the Operating System.</h3>
            <p>Please use <code>getOSName()</code> to get the operating system name.
<pre style="margin-top: 0px;">
string OS_str = CryptFence.getOSName();
</pre>
            </p>



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
