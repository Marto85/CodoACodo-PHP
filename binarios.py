def binary_arithmetic_ca2(num1, num2, operation):
    """
    Realiza la suma o resta de dos números binarios en sistema de Complemento a 2 (CA2).
    
    Args:
    num1 (str): El primer número en formato binario.
    num2 (str): El segundo número en formato binario.
    operation (str): La operación a realizar ('suma' o 'resta').
    
    Returns:
    str: El resultado de la operación en formato binario.
    """
    # Verificar que los números tengan la misma longitud
    if len(num1) != len(num2):
        raise ValueError("Los números deben tener la misma longitud.")
    
    # Convertir los números binarios a enteros
    int1 = int(num1, 2)
    int2 = int(num2, 2)
    
    # Realizar la operación
    if operation == 'suma':
        result = bin(int1 + int2)[2:]
        
        # Verificar si el resultado tiene más bits que los operandos
        if len(result) > len(num1):
            result = result[1:]
    elif operation == 'resta':
        # Obtener el complemento a 2 de num2
        complement_2 = bin((int2 ^ ((1 << len(num2)) - 1)) + 1)[2:]
        complement_2 = complement_2.zfill(len(num2))
        
        # Realizar la suma de num1 y el complemento a 2 de num2
        result = bin(int1 + int(complement_2, 2))[2:]
        
        # Verificar si el resultado tiene más bits que los operandos
        if len(result) > len(num1):
            result = result[1:]
    else:
        raise ValueError("Operación no válida. Debe ser 'suma' o 'resta'.")
    
    # Rellenar con ceros a la izquierda si es necesario
    result = result.zfill(len(num1))
    
    return result

# Ejemplo de uso
num1 = "011111111"
num2 = "100010001"
result = binary_arithmetic_ca2(num1, num2, 'suma')
print(f"Resultado: {result}")
