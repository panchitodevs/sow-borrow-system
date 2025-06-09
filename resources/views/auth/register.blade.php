<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register - Sow & Borrow</title>
   <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
   <style>
      .header-img {
         width: 100%;
         display: block;
         margin: 0;
         padding: 0;
         object-fit: cover;
         max-height: 130px;
      }
      body {
         margin: 0;
         padding: 0;
         font-family: Arial, sans-serif;
      }
      .text-left {
         margin-left: 170px;
         margin-top: 20px;
      }
      .form-group {
         margin-bottom: 15px;
         display: flex;
         align-items: center;
      }
      .form-group label {
         width: 180px;
         font-weight: bold;
      }
      .form-group input {
         padding: 8px;
         width: 250px;
         border: 1px solid #ccc;
         border-radius: 4px;
      }
button {
  display: flex;
  align-items: center;
  justify-content: center;
  outline: none;
  cursor: pointer;
  width: 150px;
  height: 50px;
  background-image: linear-gradient(to top, #D8D9DB 0%, #fff 80%, #FDFDFD 100%);
  border-radius: 30px;
  border: 1px solid #8F9092;
  transition: all 0.2s ease;
  font-family: "Source Sans Pro", sans-serif;
  font-size: 14px;
  font-weight: 600;
  color: black;
  text-shadow: 0 1px #fff;
}

button:hover {
  box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 3px 3px #CECFD1;
}

button:active {
  box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 5px 3px darkgreen, inset 0 0 30px #aaa;
}

button:focus {
  box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 5px 3px darkgreen, inset 0 0 30px #aaa;
}
.form-actions {
   margin-top: 20px;
   margin-left: 170px;
   display: flex;
   gap: 10px;
}
   </style>
</head>
<body>
   <img src="{{ asset('images/regis.png') }}" alt="Sow & Borrow Header" class="header-img">
   <hr>

   @if ($errors->any())
      <div style="color: red; margin-left: 170px;">
         <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
   @endif

   <form action="{{ route('register.store') }}" method="POST">
      @csrf
      <div class="text-left">
         <h4 style="color:darkgreen">Step 1: Enter your ATM account number and PIN</h4>
         <hr style="width: 1000px;"><br>
         <div class="form-group">
            <label for="atmAccountNumber">ATM Account Number:</label>
            <input type="text" name="atm_account_number" value="{{ old('atmAccountNumber') }}" required>
         </div>
         <div class="form-group">
            <label for="atmPin">ATM PIN:</label>
            <input type="password" name="atm_pin" required>
         </div>

         <h4 style="color:darkgreen">Step 2: Personal Information</h4>
         <hr style="width: 1000px;"><br>
         <div class="form-group">
            <label for="FirstName">First Name:</label>
            <input type="text" name="first_name" value="{{ old('FirstName') }}" required>
         </div>
         <div class="form-group">
            <label for="MiddleName">Middle Name:</label>
            <input type="text" name="middle_name" value="{{ old('MiddleName') }}" required>
         </div>
         <div class="form-group">
            <label for="LastName">Last Name:</label>
            <input type="text" name="last_name" value="{{ old('LastName') }}" required>
         </div>

         <div class="form-group">
            <label for="gender">Gender:</label>
            <select name="gender" required>
               <option value="">Select Gender</option>
               <option value="male">Male</option>
               <option value="female">Female</option>
               <option value="other">Other</option>
            </select>
         </div>
         <div class="form-group">
            <label for="civilStatus">Civil Status:</label>
            <select name="civil_status" required>
               <option value="">Select Status</option>
               <option value="single">Single</option>
               <option value="married">Married</option>
               <option value="widowed">Widowed</option>
               <option value="divorced">Divorced</option>
               <option value="separated">Separated</option>
            </select>
         </div>
         <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
         </div>
         <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" name="phone" value="{{ old('phone') }}" required>
         </div>
         <div class="form-group">
            <label for="barangay">Barangay:</label>
            <input type="text" name="barangay" value="{{ old('barangay') }}" required>
         </div>
         <div class="form-group">
            <label for="street">Street:</label>
            <input type="text" name="street" value="{{ old('street') }}" required>
         </div>
         <div class="form-group">
            <label for="city">City:</label>
            <input type="text" name="city" value="{{ old('city') }}" required>
         </div>
         <div class="form-group">
            <label for="zip">ZIP Code:</label>
            <input type="text" name="zip" value="{{ old('zip') }}" required>
         </div>
         <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" value="{{ old('dob') }}" required>
         </div>

         <h4 style="color:darkgreen">Step 3: Password</h4>
         <hr style="width: 1000px;"><br>
         <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" required>
         </div>
         <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" required>
         </div>
         <hr style="width: 1000px;"><br>
         <div class="form-actions">
            <button type="submit">Submit</button>
            <button type="reset">Clear</button>
         </div>
         <br><br><br>
      </div>
   </form>
</body>
</html>
