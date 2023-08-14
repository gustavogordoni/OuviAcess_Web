document.addEventListener("DOMContentLoaded", function() {
    const cepInput = document.getElementById("cep");
  
    cepInput.addEventListener("input", function() {
      const inputValue = cepInput.value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
      const maxLength = 8;
      const truncatedValue = inputValue.slice(0, maxLength);
      const formattedValue = formatCEP(truncatedValue);
      cepInput.value = formattedValue;
    });
  
    function formatCEP(value) {
      const regex = /^(\d{2})(\d{3})(\d{3})$/;
      const formattedValue = value.replace(regex, "$1.$2-$3");
      return formattedValue;
    }
  });
  
  document.addEventListener("DOMContentLoaded", function() {
    const dddInput = document.getElementById("ddd");
    const telefoneInput = document.getElementById("telefone");
  
    dddInput.addEventListener("input", function() {
      const inputValue = dddInput.value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
      const maxLength = 2;
      const truncatedValue = inputValue.slice(0, maxLength);
      const formattedValue = formatDDD(truncatedValue);
      dddInput.value = formattedValue;
    });
  
    telefoneInput.addEventListener("input", function() {
      const inputValue = telefoneInput.value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
      const maxLength = 9;
      const truncatedValue = inputValue.slice(0, maxLength);
      const formattedValue = formatTelefone(truncatedValue);
      telefoneInput.value = formattedValue;
    });
  
    function formatDDD(value) {
      const regex = /^(\d{2})$/;
      const formattedValue = value.replace(regex, "($1)");
      return formattedValue;
    }
  
    function formatTelefone(value) {
      const regex = /^(\d{5})(\d{4})$/;
      const formattedValue = value.replace(regex, "$1-$2");
      return formattedValue;
    }
  });
  