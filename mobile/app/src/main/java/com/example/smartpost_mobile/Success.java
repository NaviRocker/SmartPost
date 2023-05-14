package com.example.smartpost_mobile;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import com.google.zxing.integration.android.IntentIntegrator;
import com.google.zxing.integration.android.IntentResult;
import com.journeyapps.barcodescanner.CaptureActivity;
import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

public class Success extends AppCompatActivity {

    TextView textView;
    Button receiveButton;
    Button deliverButton;
    String userEmail;
    String trackingNumber;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.success);

        textView = findViewById(R.id.text);
        receiveButton = findViewById(R.id.receiveButton);
        deliverButton = findViewById(R.id.deliverButton);

        userEmail = getSessionEmail(); // Get the user email from the session

        // Set the user email in the sessionEmailTextView
        TextView sessionEmailTextView = findViewById(R.id.sessionEmailTextView);
        sessionEmailTextView.setText("Session Email: " + userEmail);

        findViewById(R.id.scanner).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Launch the barcode scanner activity
                new IntentIntegrator(Success.this)
                        .setCaptureActivity(CaptureActivity.class)
                        .setOrientationLocked(true) // Allow scanning in both portrait and landscape orientations
                        .setPrompt("Scan a Postal Tag") // Set a custom prompt message
                        .initiateScan();
            }
        });

        receiveButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Perform the receive operation with the user email and tracking number
                performReceiveOperation(userEmail, trackingNumber);
            }
        });

        deliverButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Perform the deliver operation with the user email and tracking number
                performDeliverOperation(userEmail, trackingNumber);
            }
        });
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        IntentResult intentResult = IntentIntegrator.parseActivityResult(requestCode, resultCode, data);
        if (intentResult != null) {
            String contents = intentResult.getContents();
            if (contents != null) {
                textView.setText("Tracking ID: " + contents);
                textView.setVisibility(View.VISIBLE);
                trackingNumber = contents; // Store the tracking number
            }
        }
    }

    private String getSessionEmail() {
        SharedPreferences sharedPreferences = getSharedPreferences("Session", MODE_PRIVATE);
        return sharedPreferences.getString("email", "");
    }

    private void performReceiveOperation(String userEmail, String trackingNumber) {
        String url = "http://192.168.8.139/NewShit/admin/applogin/receive.php";
        StringRequest stringRequest = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        // Handle the response from the server
                        if (response.equals("success")) {
                            // Receive operation successful
                            textView.setText("Package Received Successfully");
                        } else {
                            // Receive operation failed
                            textView.setText("Package Receive Failed");
                        }
                    }

                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        error.printStackTrace();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();
                params.put("email", userEmail);
                params.put("trackingNumber", trackingNumber);
                return params;
            }
        };

        // Add the request to the RequestQueue
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }


    private void performDeliverOperation(String userEmail, String trackingNumber) {
        String url = "http://192.168.8.139/NewShit/admin/applogin/deliver.php";
        StringRequest stringRequest = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        // Handle the response from the server
                        if (response.equals("success")) {
                            // Deliver operation successful
                            textView.setText("Package Delivered Successfully");
                        } else {
                            // Deliver operation failed
                            textView.setText("Package Delivery Failed");
                        }
                    }

                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        error.printStackTrace();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();
                params.put("email", userEmail);
                params.put("trackingNumber", trackingNumber);
                return params;
            }
        };

        // Add the request to the RequestQueue
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

}