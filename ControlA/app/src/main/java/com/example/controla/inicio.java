package com.example.controla;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class inicio extends AppCompatActivity {

    private TextView textBienvenida;
    private EditText codigo;
    private Button btnCerrar;
    private Button btnConfirmar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_inicio);

        textBienvenida = findViewById(R.id.textBienvenida);
        codigo = findViewById(R.id.codigo);
        btnCerrar = findViewById(R.id.btnCerrar);
        btnConfirmar = findViewById(R.id.btnConfirmar);

        // Llama a tu método para obtener el nombre del usuario
        String nombreUsuario = getIntent().getStringExtra("nombreUsuario");

        textBienvenida.setText("Bienvenido, " + nombreUsuario);

        // Recuperar el ID de usuario de las preferencias compartidas
        SharedPreferences preferences = getSharedPreferences("preferenciasLogin", Context.MODE_PRIVATE);
        String idUsuario = preferences.getString("email", "");

        btnConfirmar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String codigoIngresado = codigo.getText().toString().trim();
                if (!codigoIngresado.isEmpty()) {
                    // Si el código ingresado no está vacío, llama al método para verificar el código
                    Log.d("inicio", "Código ingresado: " + codigoIngresado);
                    verificarCodigo(codigoIngresado); // Pasar el ID de usuario como parámetro
                } else {
                    // Si el código ingresado está vacío, muestra un mensaje de error
                    Toast.makeText(inicio.this, "Por favor ingresa un código", Toast.LENGTH_SHORT).show();
                }
            }
        });

        btnCerrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                SharedPreferences preferences = getSharedPreferences("preferenciasLogin", Context.MODE_PRIVATE);
                preferences.edit().clear().commit();

                Intent intent = new Intent(getApplicationContext(), MainActivity.class);
                startActivity(intent);
                finish();
            }
        });
    }

    // Enviar la solicitud de verificación del código al servidor
    private void verificarCodigo(final String codigoIngresado) {
        String url = "https://b46d-181-64-193-148.ngrok-free.app/cocacola/validarCodigoAndroid.php";

        StringRequest stringRequest = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        // Procesar la respuesta del servidor
                        Log.d("MainActivity", "Respuesta del servidor: " + response);
                        try {
                            JSONObject jsonResponse = new JSONObject(response);
                            if (jsonResponse.has("success") && jsonResponse.has("message")) {
                                boolean success = jsonResponse.getBoolean("success");
                                String message = jsonResponse.getString("message");

                                if (success) {
                                    // Mostrar un mensaje de éxito
                                    Toast.makeText(inicio.this, message, Toast.LENGTH_SHORT).show();
                                } else {
                                    // Mostrar un mensaje de error
                                    Toast.makeText(inicio.this, message, Toast.LENGTH_SHORT).show();
                                }
                            } else {
                                Toast.makeText(inicio.this, "Respuesta JSON incorrecta", Toast.LENGTH_SHORT).show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            // Mostrar un mensaje de error en caso de error de respuesta
                            Toast.makeText(inicio.this, "Error al procesar la respuesta del servidor", Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        error.printStackTrace();
                        // Mostrar un mensaje de error en caso de error de conexión
                        Toast.makeText(inicio.this, "Error de conexión", Toast.LENGTH_SHORT).show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("codigo", codigoIngresado);
                return params;
            }
        };

        // Agregar la solicitud a la cola de solicitudes
        Volley.newRequestQueue(this).add(stringRequest);
    }
}

