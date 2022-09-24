class ValidatorRut {
    constructor(rut) {
        this.rut = rut;
        // Obtenemos el ultimo caracter ingresado del rut
        this.dv = this.rut.substring(this.rut.length - 1);
        // limpiar el rut dejando solamente los números
        this.rut = this.rut.substring(0, this.rut.length - 1).replace(/\D/g, ''); 
        // replace() está reemplazando por un string vacío los datos que no son nros (puntos y guión)
        this.isValid = this.validateRut();
    }

    validateRut() {
        let numbersArray = this.rut.split('').reverse()
        // reverse() permite invertir el orden del array
        let acumulator = 0;
        let multiplicator = 2;
        for(let numero of numbersArray) {
            acumulator += parseInt(numero) * multiplicator; // Hasta ahora se tenía un array de string, debemos convertirlo a números mediante parseInt()
            multiplicator++;
            if(multiplicator == 8) {
                multiplicator = 2;
            }
        }

        let dv = 11 - (acumulator % 11);

        if(dv == 11)
            dv = '0'
        if(dv == 10)
            dv = 'k';

        return dv == this.dv.toLowerCase();;
    }

    format() {
        if(!this.isValid) return '';

        return (this.rut.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')) + '-' + this.dv
    }

}




