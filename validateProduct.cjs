// const Joi = require('joi');

// // Definir el esquema de validación con Joi
// const productSchema = Joi.object({
//     name: Joi.string().min(3).max(30).required(),
//     description: Joi.string().max(500).optional(),
//     height: Joi.number().positive().optional(),
//     length: Joi.number().positive().optional(),
//     width: Joi.number().positive().optional()
// });

// // Función para validar el producto
// function validateProduct(product) {
//     const { error } = productSchema.validate(product);
//     if (error) {
//         return { valid: false, message: error.details[0].message };
//     }
//     return { valid: true };
// }

// // Exportar la función para que pueda ser utilizada
// module.exports = validateProduct;

const fs = require('fs');
const path = require('path');
const Joi = require('joi');

// Definir el esquema de validación con Joi
const productSchema = Joi.object({
    name: Joi.string().min(3).max(30).required(),
    description: Joi.string().max(500).optional(),
    height: Joi.number().positive().optional(),
    length: Joi.number().positive().optional(),
    width: Joi.number().positive().optional()
});

// Función para validar el producto
function validateProduct(product) {
    const { error } = productSchema.validate(product);
    if (error) {
        return { valid: false, message: error.details[0].message };
    }
    return { valid: true };
}

// // Obtener datos desde la línea de comandos
// const input = process.argv[2];
// const product = JSON.parse(input);

// // Validar y retornar el resultado
// const result = validateProduct(product);
// console.log(JSON.stringify(result));
try {
    // Obtener datos desde la línea de comandos
    const input = process.argv[2];

    // Ruta del archivo de log
    const logFilePath = path.join(__dirname, 'validateProduct.log');

    // Escribir la entrada en el archivo de log
    fs.appendFileSync(logFilePath, `Input received: ${input}\n`);

    if (!input) {
        fs.appendFileSync(logFilePath, 'No input provided\n');
        process.exit(1);  // Salir si no hay entrada
    }

    const product = JSON.parse(input);
    fs.appendFileSync(logFilePath, `Parsed product: ${JSON.stringify(product)}\n`);

    // Validar y retornar el resultado
    const result = validateProduct(product);
    fs.appendFileSync(logFilePath, `Validation result: ${JSON.stringify(result)}\n`);
    console.log(JSON.stringify(result)); // Esto es lo que debe capturar PHP
} catch (error) {
    fs.appendFileSync(logFilePath, `Error occurred: ${error}\n`);
    console.error('Error occurred:', error); // Registrar errores en stderr
    process.exit(1); // Salir con código de error
}
