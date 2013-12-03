<?php

// Check the person is logged in!
session_start();    
if (isset($_SESSION['userID']))
{
    $user_id = $_SESSION['userID'];
    //If logged in, go to the HTML page:
}
else
{
header('Location: https://3yp.villocq.com/patient'); 
}
?>
<html>
<head> <title>Cardiac Track App</title>
<link rel="stylesheet" type="text/css" href="Cardiac_Track_Style.css">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=0.95; user-scalable=0;">
<script type="text/javascript">
function submitform()
{
document.forms["jsform"].submit();
}

</script>
</head>

<body >
<div class="main_page">

<div id="title_menu">
Cardiac Track
</div>

<div class="page_header" style="position: relative; top: 98px;">
<a href="menu.php">
<img src="menu_button.png" style="float:left">
</a>
Update
</div>

<div id="enter_data">
Please enter your data for today:
</div>
<form id="jsform" action="submit.php" method="post">
<div class="daily_data">
<div id="blood_pressure">
Systolic Blood Pressure	
</div>
	<select name = "sysBP" class="drop_down">
		<option value="100">100</option>
		<option value="101">101</option>
		<option value="102">102</option>
		<option value="103">103</option>
		<option value="104">104</option>
		<option value="105">105</option>
		<option value="106">106</option>
		<option value="107">107</option>
		<option value="108">108</option>
		<option value="109">109</option>
		<option value="110">110</option>
		<option value="111">111</option>
		<option value="112">112</option>
		<option value="113">113</option>
		<option value="114">114</option>
		<option value="115">115</option>
		<option value="116">116</option>
		<option value="117">117</option>
		<option value="118">118</option>
		<option value="119">119</option>
		<option value="120">120</option>
		<option value="121">121</option>
		<option value="122">122</option>
		<option value="123">123</option>
		<option value="124">124</option>
		<option value="125">125</option>
		<option value="126">126</option>
		<option value="127">127</option>
		<option value="128">128</option>
		<option value="129">129</option>
		<option value="130">130</option>
		<option value="131">131</option>
		<option value="132">132</option>
		<option value="133">133</option>
		<option value="134">134</option>
		<option value="135">135</option>
		<option value="136">136</option>
		<option value="137">137</option>
		<option value="138">138</option>
		<option value="139">139</option>
		<option value="140">140</option>
		<option value="141">141</option>
		<option value="142">142</option>
		<option value="143">143</option>
		<option value="144">144</option>
		<option value="145">145</option>
		<option value="146">146</option>
		<option value="147">147</option>
		<option value="148">148</option>
		<option value="149">149</option>
		<option value="150">150</option>
		<option value="151">151</option>
		<option value="152">152</option>
		<option value="153">153</option>
		<option value="154">154</option>
		<option value="155">155</option>
		<option value="156">156</option>
		<option value="157">157</option>
		<option value="158">158</option>
		<option value="159">159</option>
		<option value="160">160</option>
		<option value="161">161</option>
		<option value="162">162</option>
		<option value="163">163</option>
		<option value="164">164</option>
		<option value="165">165</option>
		<option value="166">166</option>
		<option value="167">167</option>
		<option value="168">168</option>
		<option value="169">169</option>
		<option value="170">170</option>
		<option value="171">171</option>
		<option value="172">172</option>
		<option value="173">173</option>
		<option value="174">174</option>
		<option value="175">175</option>
		<option value="176">176</option>
		<option value="177">177</option>
		<option value="178">178</option>
		<option value="179">179</option>
		<option value="180">180</option>
		<option value="181">181</option>
		<option value="182">182</option>
		<option value="183">183</option>
		<option value="184">184</option>
		<option value="185">185</option>
		<option value="186">186</option>
		<option value="187">187</option>
		<option value="188">188</option>
		<option value="189">189</option>
		<option value="190">190</option>
</select>
</div>

<div class="daily_data">
<div id="heart_rate">
Diastolic Blood Pressure	
</div>
	<select name="diaBP" class="drop_down">
		<option value="60">60</option>
		<option value="61">61</option>
		<option value="62">62</option>
		<option value="63">63</option>
		<option value="64">64</option>
		<option value="65">65</option>
		<option value="66">66</option>
		<option value="67">67</option>
		<option value="68">68</option>
		<option value="69">69</option>
		<option value="70">70</option>
		<option value="71">71</option>
		<option value="72">72</option>
		<option value="73">73</option>
		<option value="74">74</option>
		<option value="75">75</option>
		<option value="76">76</option>
		<option value="77">77</option>
		<option value="78">78</option>
		<option value="79">79</option>
		<option value="80">80</option>
		<option value="81">81</option>
		<option value="82">82</option>
		<option value="83">83</option>
		<option value="84">84</option>
		<option value="85">85</option>
		<option value="86">86</option>
		<option value="87">87</option>
		<option value="88">88</option>
		<option value="89">89</option>
		<option value="90">90</option>
		<option value="91">91</option>
		<option value="92">92</option>
		<option value="93">93</option>
		<option value="94">94</option>
		<option value="95">95</option>
		<option value="96">96</option>
		<option value="97">97</option>
		<option value="98">98</option>
		<option value="99">99</option>
		<option value="100">100</option>
		<option value="101">101</option>
		<option value="102">102</option>
		<option value="103">103</option>
		<option value="104">104</option>
		<option value="105">105</option>
		<option value="106">106</option>
		<option value="107">107</option>
		<option value="108">108</option>
		<option value="109">109</option>
		<option value="110">110</option>
		<option value="111">111</option>
		<option value="112">112</option>
		<option value="113">113</option>
		<option value="114">114</option>
		<option value="115">115</option>
		<option value="116">116</option>
		<option value="117">117</option>
		<option value="118">118</option>
		<option value="119">119</option>
		<option value="120">120</option>
		<option value="121">121</option>
		<option value="122">122</option>
		<option value="123">123</option>
		<option value="124">124</option>
		<option value="125">125</option>
		<option value="126">126</option>
		<option value="127">127</option>
		<option value="128">128</option>
		<option value="129">129</option>
		<option value="130">130</option>
		<option value="131">131</option>
		<option value="132">132</option>
		<option value="133">133</option>
		<option value="134">134</option>
		<option value="135">135</option>
		<option value="136">136</option>
		<option value="137">137</option>
		<option value="138">138</option>
		<option value="139">139</option>
		<option value="140">140</option>
		<option value="141">141</option>
		<option value="142">142</option>
		<option value="143">143</option>
		<option value="144">144</option>
		<option value="145">145</option>
		<option value="146">146</option>
		<option value="147">147</option>
		<option value="148">148</option>
		<option value="149">149</option>
		<option value="150">150</option>
</select>
</div>

<div class="daily_data">
<div id="Weight">
Weight (kg)	
</div>
	<select class="drop_down">
		<option value="50">50</option>
		<option value="51">51</option>
		<option value="52">52</option>
		<option value="53">53</option>
		<option value="54">54</option>
		<option value="55">55</option>
		<option value="56">56</option>
		<option value="57">57</option>
		<option value="58">58</option>
		<option value="59">59</option>
		<option value="60">60</option>
		<option value="61">61</option>
		<option value="62">62</option>
		<option value="63">63</option>
		<option value="64">64</option>
		<option value="65">65</option>
		<option value="66">66</option>
		<option value="67">67</option>
		<option value="68">68</option>
		<option value="69">69</option>
		<option value="70">70</option>
		<option value="71">71</option>
		<option value="72">72</option>
		<option value="73">73</option>
		<option value="74">74</option>
		<option value="75">75</option>
		<option value="76">76</option>
		<option value="77">77</option>
		<option value="78">78</option>
		<option value="79">79</option>
		<option value="80">80</option>
		<option value="81">81</option>
		<option value="82">82</option>
		<option value="83">83</option>
		<option value="84">84</option>
		<option value="85">85</option>
		<option value="86">86</option>
		<option value="87">87</option>
		<option value="88">88</option>
		<option value="89">89</option>
		<option value="90">90</option>
		<option value="91">91</option>
		<option value="92">92</option>
		<option value="93">93</option>
		<option value="94">94</option>
		<option value="95">95</option>
		<option value="96">96</option>
		<option value="97">97</option>
		<option value="98">98</option>
		<option value="99">99</option>
		<option value="100">100</option>
		<option value="101">101</option>
		<option value="102">102</option>
		<option value="103">103</option>
		<option value="104">104</option>
		<option value="105">105</option>
		<option value="106">106</option>
		<option value="107">107</option>
		<option value="108">108</option>
		<option value="109">109</option>
		<option value="110">110</option>
		<option value="111">111</option>
		<option value="112">112</option>
		<option value="113">113</option>
		<option value="114">114</option>
		<option value="115">115</option>
		<option value="116">116</option>
		<option value="117">117</option>
		<option value="118">118</option>
		<option value="119">119</option>
		<option value="120">120</option>
		<option value="121">121</option>
		<option value="122">122</option>
		<option value="123">123</option>
		<option value="124">124</option>
		<option value="125">125</option>
		<option value="126">126</option>
		<option value="127">127</option>
		<option value="128">128</option>
		<option value="129">129</option>
		<option value="130">130</option>
		<option value="131">131</option>
		<option value="132">132</option>
		<option value="133">133</option>
		<option value="134">134</option>
		<option value="135">135</option>
		<option value="136">136</option>
		<option value="137">137</option>
		<option value="138">138</option>
		<option value="139">139</option>
		<option value="140">140</option>
		<option value="141">141</option>
		<option value="142">142</option>
		<option value="143">143</option>
		<option value="144">144</option>
		<option value="145">145</option>
		<option value="146">146</option>
		<option value="147">147</option>
		<option value="148">148</option>
		<option value="149">149</option>
		<option value="150">150</option>
</select>
</div>

<div><a href="javascript: submitform()" id="submit">
	Submit</a>
</div>
</form>
<body>

</html>