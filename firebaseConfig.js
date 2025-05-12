// firebaseConfig.js
import { initializeApp } from "firebase/app";
import { getFirestore } from "firebase/firestore";

const firebaseConfig = {
  apiKey: "AIzaSyD7s5mmGYkvAFbCXZrYNwefh9RnmNwQuzi0",
  authDomain: "idtrabajadores.firebaseapp.com",
  projectId: "idtrabajadores",
  storageBucket: "idtrabajadores.appspot.com",
  messagingSenderId: "476040391869",
  appId: "1:476040391869:web:342d794ed1aaf54ce49bd4",
  measurementId: "G-9XR5E02ZZ2"
};

const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

export { db };
