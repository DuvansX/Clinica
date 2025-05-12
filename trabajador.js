import { db } from './firebaseConfig.js';
import { doc, setDoc, updateDoc } from "firebase/firestore";

let watchId = null;
let idPedido = null;

window.generarID = async () => {
  idPedido = Math.floor(100000 + Math.random() * 900000).toString();
  const docRef = doc(db, "pedidos", idPedido);

  if (navigator.geolocation) {
    // Ubicación inicial
    navigator.geolocation.getCurrentPosition(async (pos) => {
      const { latitude, longitude } = pos.coords;

      await setDoc(docRef, {
        id: idPedido,
        ubicacion: { lat: latitude, lon: longitude },
        activo: true,
        timestamp: new Date()
      });

      document.getElementById("resultado").innerText = `ID generado: ${idPedido}`;
    });

    // Seguimiento continuo
    watchId = navigator.geolocation.watchPosition(async (pos) => {
      const { latitude, longitude } = pos.coords;

      await updateDoc(docRef, {
        ubicacion: { lat: latitude, lon: longitude },
        timestamp: new Date()
      });
    });
  } else {
    alert("Tu navegador no soporta geolocalización.");
  }
};

window.cancelarID = async () => {
  if (watchId !== null) {
    navigator.geolocation.clearWatch(watchId);
    watchId = null;

    if (idPedido) {
      const docRef = doc(db, "pedidos", idPedido);
      await updateDoc(docRef, { activo: false });
    }

    document.getElementById("resultado").innerText = "Seguimiento cancelado.";
    idPedido = null;
  }
};
