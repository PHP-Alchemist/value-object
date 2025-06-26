# AbstractVOString

## Methods

### getValue() 
Returns: string; Returns the value of the VO

### contains(mixed \$needle, bool \$caseInsensitive = false) 
Returns: bool; Evaluates if a string is part of the VO string

### endsWith(mixed \$needle) 
Returns: bool; Evaluates the VO string ends with the provided string

### equals(VOStringInterface \$comparitive) 
Returns: bool; Evaluates if provided `VOStringInterface` object values 
are equal

### hasValue()
Returns: bool; Evaluates if VO has a value


### indexOf(string \$needle, int \$startIndex = 0)
Returns: int|false; Returns the position of `$needle` in VO. Returns 
`false` if doesn't match


### lastIndexOf(string \$needle, int \$startIndex = 0)
Returns: int|false; Returns the last position of `$needle` in VO. Returns
`false` if doesn't match

### length()
Returns: VONumberInterface|int; Returns length of VO's string. 
Interface allows for returning a `VONumberInterface` object or PHP int.


### lower()
Returns: null|string; Returns value of VO in all lower case. Allows
nullable.

### startsWith(mixed \$needle)
Returns: bool; Evaluates if VO string begins with provided `$needle`.


### substring(int \$offset, ?int \$length = null)
Returns: string|Stringable; Performs substring operations on the VO
value and returns that string. `VOStringInterface` provides flexibility 
to return Stringable object (`VOStringInterface` implements `\Stringable`)