<?php
require $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
function colorizeStringsAndChars($code)
{
    $code = explode('"', $code);
    $str = '';
    for ($i = 0;$i < count($code);$i ++)
    {
        if ($i % 2 == 0)
        {
            if ($i == count($code) - 1)
                $str .= $code[$i];
            else
                $str .= $code[$i] . '<span class="yellow">"';
        }
        else
            $str .= $code[$i] . '"</span>';
    }
    $code = explode('\'', $str);
    $str = '';
    for ($i = 0;$i < count($code);$i ++)
    {
        if ($i % 2 == 0)
        {
            if ($i == count($code) - 1)
                $str .= $code[$i];
            else
                $str .= $code[$i] . '<span class="yellow">\'';
        }
        else
            $str .= $code[$i] . '\'</span>';
    }
    
    return $str;
}
function showCode($code)
{
    $code = str_replace('	', '   ', $code);
    $code = htmlspecialchars($code, ENT_NOQUOTES);
    
    $code = colorizeStringsAndChars($code);
    
    $code = str_replace('public ', '<span class="purple">public</span> ', $code);
    $code = str_replace('import ', '<span class="purple">import</span> ', $code);
    $code = str_replace('class ', '<span class="purple">class</span> ', $code);
    $code = str_replace('static ', '<span class="purple">static</span> ', $code);
    $code = str_replace('void ', '<span class="purple">void</span> ', $code);
    $code = str_replace('new ', '<span class="purple">new</span> ', $code);
    $code = str_replace('int ', '<span class="purple">int</span> ', $code);
    $code = str_replace('int[', '<span class="purple">int</span>[', $code);
    $code = str_replace('char ', '<span class="purple">char</span> ', $code);
    $code = str_replace('char[', '<span class="purple">char</span>[', $code);
    $code = str_replace('double ', '<span class="purple">double</span> ', $code);
    $code = str_replace('boolean ', '<span class="purple">boolean</span> ', $code);
    $code = str_replace('long ', '<span class="purple">long</span> ', $code);
    $code = str_replace('(int) ', '(<span class="purple">int</span>) ', $code);
    $code = str_replace('(double) ', '(<span class="purple">double</span>) ', $code);
    $code = str_replace('for (', '<span class="purple">for</span> (', $code);
    $code = str_replace('while ', '<span class="purple">while</span> ', $code);
    $code = str_replace('  do', '  <span class="purple">do</span>', $code);
    $code = str_replace('if (', '<span class="purple">if</span> (', $code);
    $code = str_replace(' else', ' <span class="purple">else</span>', $code);
    $code = str_replace("else\r", "<span class=\"purple\">else</span>\r", $code);
    $code = str_replace('switch ', '<span class="purple">switch</span> ', $code);
    $code = str_replace('case ', '<span class="purple">case</span> ', $code);
    $code = str_replace('enum ', '<span class="purple">enum</span> ', $code);
    $code = str_replace('implements ', '<span class="purple">implements</span> ', $code);
    $code = str_replace('private ', '<span class="purple">private</span> ', $code);
    $code = str_replace('throw ', '<span class="purple">throw</span> ', $code);
    $code = str_replace('instanceof ', '<span class="purple">instanceof</span> ', $code);
    $code = str_replace(' break;', ' <span class="purple">break</span>;', $code);
    $code = str_replace(' false', ' <span class="purple">false</span>', $code);
    $code = str_replace(' true', ' <span class="purple">true</span>', $code);
    $code = str_replace(' this.', ' <span class="purple">this</span>.', $code);
    $code = str_replace('return ', '<span class="purple">return</span> ', $code);
    $code = str_replace(' return;', ' <span class="purple">return</span>;', $code);
    
    $code = str_replace('.out.', '.<span class="aqua">out</span>.', $code);
    $code = str_replace('.length;', '.<span class="aqua">length</span>;', $code);
    $code = str_replace('.length ', '.<span class="aqua">length</span> ', $code);
    $code = str_replace('.length)', '.<span class="aqua">length</span>)', $code);
    $code = str_replace('.in);', '.<span class="aqua">in</span>);', $code);
    $code = str_replace('Math.PI', 'Math.<span class="aqua">PI</span>', $code);
    
    echo $code;
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
<body>
<div id="wrapper">
<?php printHeader(2); ?>
<main>
<div id="content-wrap">
<div class="content-wrap-inner">
<h2>Learn Java</h2>
<p>
In this page you will find plenty of Java questions and answers for first year students.<br>
I hope you will find it useful, I put some effort into it :)<br>
Feel free to <a href="/contact" title="Contact me">contact me</a> if you find any mistakes or encounter a problem.<br>
The page is in hebrew for your convenience.
</p>
<div class="rtl">
<!-- QUESTION 1 START -->
<h3>שאלה 1</h3>
<p>
כתוב תכנית המקבלת מספר בין 1-10 מהמשתמש (התכנית תדפיס הודעת שגיאה אם המספר לא בטווח).<br>
אם המספר שהוזן בין 1-5 (כולל) התכנית תדפיס משולש של @<br>
אם המספר בין 6-10 (כולל) התכנית תדפיס משולש של #<br>
כאשר בשורה הראשונה יהיה תו אחד, בשורה השנייה שני תווים וכך הלאה.
</p>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
לדוגמה עבור הקלט 5, יודפס המשולש הבא:<br>
<span>
@<br>
@@<br>
@@@<br>
@@@@<br>
@@@@@
</span>
</div>
<div>
עבור הקלט 7 יודפס המשולש הבא:<br>
<span>
#<br>
##<br>
###<br>
####<br>
#####<br>
######<br>
#######
</span>
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('import java.util.Scanner;

public class Targil1
{
	public static void main(String[] args)
	{
		Scanner sc = new Scanner(System.in);
		System.out.print("Enter a number between 1 to 10: ");
		int n = sc.nextInt();
		if (n >= 1 && n <= 10)
		{
			if (n < 6)
			{
				for (int i = 1;i <= n;i++)
				{
					for (int j = 0;j < i;j++)
						System.out.print("@");
					System.out.println();
				}
			}
			else
			{
				for (int i = 1;i <= n;i++)
				{
					for (int j = 0;j < i;j++)
						System.out.print("#");
					System.out.println();
				}
			}
		}
		else
			System.out.println("Error, only 1-10.");
		sc.close();
	}
}'); ?>
</pre>
</details>
<!-- QUESTION 1 END -->
<!-- QUESTION 2 START -->
<h3>שאלה 2</h3>
<div>
כתוב תכנית המוצאת את כל המספרים בין 100-500 המקיימים את התנאי הבא:<br>
אם לוקחים כל ספרה במספר ומעלים אותה בחזקת 3 וסוכמים את התוצאות, מקבלים בחזרה את המספר המקורי.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
לדוגמה עבור המספר 153 מתקיים ש:<br>
<span>1^3 + 5^3 + 3^3 = 153</span>
</div>
<div>
רמז: יש 4 מספרים כאלה בטווח הנתון.
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('public class Targil2
{
	public static void main(String[] args)
	{
		for (int i = 100;i <= 500;i++)
		{
			int ahadot = i % 10;
			int asarot = i / 10 % 10;
			int meot = i / 100 % 10;
			int pow = (int) (Math.pow(ahadot, 3) + Math.pow(asarot, 3) + Math.pow(meot, 3));
			if (pow == i)
				System.out.println("Found special number: " + i);
		}
	}
}'); ?>
</pre>
</details>
<!-- QUESTION 2 END -->
<!-- QUESTION 3 START -->
<h3>שאלה 3</h3>
<div>
כתוב תכנית המקבלת כקלט מספר גדול מ-0, לאחר מכן התכנית תציג את התפריט הבא:<br>
1. התכנית תדפיס אם המספר שהוזן מתחלק ב-3 ללא שארית.<br>
2. התכנית תדפיס את סכום הריבועים של הספרות של המספר שהוזן.<br>
3. התכנית תדפיס אם המספר שהוזן הוא ראשוני או לא.<br>
המשתמש יזין מספר נוסף לפיו התכנית תבצע פעולה מהתפריט על המספר הראשון שהוזן.<br>
הנחיות: יש לבקש קלט עד שהוזן קלט תקין בשני המקרים, יש להשתמש ב- switch.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
<span>
Enter a number bigger than 0: <span class="green">-3</span><br>
Enter a number bigger than 0: <span class="green">3</span><br>
Enter 1 to check if the number divides by 3.<br>
Enter 2 to calculate sum of powed numbers.<br>
Enter 3 to check if the number is prime.<br>
<span class="green">3</span><br>
The number 3 is prime.
</span>
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('import java.util.Scanner;

public class Targil3
{
	public static void main(String[] args)
	{
		Scanner sc = new Scanner(System.in);
		int num;
		do
		{
			System.out.print("Enter a number bigger than 0: ");
			num = sc.nextInt();
		} while (num < 1);
		int choice;
		do
		{
			System.out.println("Enter 1 to check if the number divides by 3.");
			System.out.println("Enter 2 to calculate sum of powed numbers.");
			System.out.println("Enter 3 to check if the number is prime.");
			choice = sc.nextInt();
		} while (choice != 1 && choice != 2 && choice != 3);
		switch (choice)
		{
			case 1:
				if (num % 3 == 0)
					System.out.println("The number " + num + " is dividable by 3.");
				else
					System.out.println("The number " + num + " is not dividable by 3.");
				break;
			case 2:
				int copy = num;
				int sum = 0;
				while (copy > 0)
				{
					sum += Math.pow(copy % 10, 2);
					copy /= 10;
				}
				System.out.println("Sum of powed numbers of " + num + " is " + sum + ".");
				break;
			case 3:
				boolean isPrime = num > 1;
				for (int i = 2;i < num / 2 + 1 && isPrime;i++)
					if (num % i == 0)
						isPrime = false;
				if (isPrime)
					System.out.println("The number " + num + " is prime.");
				else
					System.out.println("The number " + num + " is not prime.");
				break;
		}
		sc.close();
	}
}'); ?>
</pre>
</details>
<!-- QUESTION 3 END -->
<!-- QUESTION 4 START -->
<h3>שאלה 4</h3>
<div>
כתוב תכנית הקולטת שמות של 2 שחקנים, התכנית תרוץ במשך 10 סיבובים כאשר בכל סיבוב התכנית תגריל מספר אקראי בין 1-6 המייצג זריקת קובייה עבור כל שחקן.<br>
בכל סיבוב יש להדפיס את מספר הסבב, את שמות השחקנים ואת המספר שהוגרל עבור כל אחד.<br>
בכל סיבוב השחקן עם המספר הגדול יותר יקבל 2 נקודות, אם יש תיקו כל שחקן יקבל נקודה אחת.<br>
בסוף ההרצה התכנית תדפיס את שם המנצח עם מספר הנקודות שצבר, או תיקו במידה ולשני השחקנים יש אותה כמות נקודות.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
<span>
Enter player 1 name: <span class="green">Moshe</span><br>
Enter player 2 name: <span class="green">Danny</span><br>
Round 1:<br>
Moshe - 5, Danny - 1<br>
Round 2:<br>
Moshe - 1, Danny - 3<br>
Round 3:<br>
Moshe - 1, Danny - 6<br>
Round 4:<br>
Moshe - 2, Danny - 1<br>
Round 5:<br>
Moshe - 2, Danny - 3<br>
Round 6:<br>
Moshe - 4, Danny - 1<br>
Round 7:<br>
Moshe - 2, Danny - 1<br>
Round 8:<br>
Moshe - 1, Danny - 4<br>
Round 9:<br>
Moshe - 5, Danny - 1<br>
Round 10:<br>
Moshe - 2, Danny - 5<br>
Tie, both players had the same amount of points.
</span>
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('import java.util.Random;
import java.util.Scanner;

public class Targil4
{
	public static void main(String[] args)
	{
		Scanner sc = new Scanner(System.in);
		System.out.print("Enter player 1 name: ");
		String player1Name = sc.next();
		System.out.print("Enter player 2 name: ");
		String player2Name = sc.next();
		
		Random rnd = new Random();
		int player1Points = 0;
		int player2Points = 0;
		for (int i = 1;i <= 10;i++)
		{
			int player1Cube = rnd.nextInt(6) + 1;
			int player2Cube = rnd.nextInt(6) + 1;
			if (player1Cube > player2Cube)
				player1Points += 2;
			else if (player2Cube > player1Cube)
				player2Points += 2;
			else
			{
				player1Points++;
				player2Points++;
			}
			
			System.out.println("Round " + i + ":");
			System.out.println(player1Name + " - " + player1Cube + ", " + player2Name + " - " + player2Cube);
		}
		if (player1Points > player2Points)
			System.out.println(player1Name + " is the winner with " + player1Points + " points!");
		else if (player2Points > player1Points)
			System.out.println(player2Name + " is the winner with " + player2Points + " points!");
		else
			System.out.println("Tie, both players had the same amount of points.");
		sc.close();
	}
}'); ?>
</pre>
</details>
<!-- QUESTION 4 END -->
<!-- QUESTION 5 START -->
<h3>שאלה 5</h3>
<div>
כתוב תכנית המדפיסה לוח שחמט כך שכל ריבוע שחור יסומן ב- @ וכל ריבוע לבן יסומן ב- #<br>
רמז: לוח שחמט הוא ריבוע 8*8 כך שאין שני ריבועים צמודים בעלי אותו צבע.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
<span>
#@#@#@#@<br>
@#@#@#@#<br>
#@#@#@#@<br>
@#@#@#@#<br>
#@#@#@#@<br>
@#@#@#@#<br>
#@#@#@#@<br>
@#@#@#@#
</span>
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('public class Targil5
{
	public static void main(String[] args)
	{
		for (int i = 0;i < 8;i++)
		{
			for (int j = 0;j < 8;j++)
			{
				if (i % 2 == 0)
				{
					if (j % 2 == 0)
						System.out.print("#");
					else
						System.out.print("@");
				}
				else
				{
					if (j % 2 == 0)
						System.out.print("@");
					else
						System.out.print("#");
				}
			}
			
			System.out.println();
		}
	}
}'); ?>
</pre>
</details>
<!-- QUESTION 5 END -->
<!-- QUESTION 6 START -->
<h3>שאלה 6</h3>
<div>
כתוב תכנית בה אתה מכניס את שמך המלא למשתנה (2 מילים בדיוק), לאחר מכן על המשתמש לנסות לנחש שם זה.<br>
יש לאמת שהמשתמש אכן הזין שם מלא, אם יש רווחים בתחילת או סוף המחרוזת יש להסירם, התכנית תבדוק את הדברים הבאים:<br>
1. אם השמות תואמים באופן מושלם, התכנית תדפיס "Perfect match".<br>
2. אם השמות תואמים רק עם שוני בין אותיות קטנות וגדולות, התכנית תדפיס "Almost perfect match".<br>
3. אם השם שהמשתמש ניחש קצר יותר משמך, התכנית תדפיס "Guess too short".<br>
4. אם השם שהמשתמש ניחש ארוך יותר משמך, התכנית תדפיס "Guess too long".<br>
5. אם יש התאמה בין השם שלך לשם שהמשתמש הזין אך הסדר הפוך (לדוגמה "Sahar Atias" ו- "Atias Sahar") התכנית תדפיס "Reversed match".<br>
לבסוף התכנית תדפיס את שמך המלא כאשר השם הפרטי והמשפחה מודפסים כל אחד בשורה משלו, השם משפחה באותיות גדולות והשם הפרטי באותיות קטנות.<br>
לאחר מכן התכנית תדפיס שוב את שמך המלא, הפעם הכל בשורה אחת, כך שרווח מוחלף במקף.<br>
הערות: אין להשתמש במערכים, השתמשו במתודות שבמחלקת String.<br>
עבור שני הסעיפים האחרונים יש להשתמש במשתנה אותו הגדרתם בתחילת התכנים עם שמכם.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
למשל עבור השם "Sahar Atias" והקלט מהמשתמש "Atias Sahar" הפלט יהיה:
<span>
Reversed match<br>
The name was:<br>
SAHAR<br>
atias<br>
Sahar_Atias<br>
</span>
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('import java.util.Scanner;

public class Targil6
{
	public static void main(String[] args)
	{
		String nameToGuess = "Sahar Atias";
		
		Scanner sc = new Scanner(System.in);
		String guessedName;
		do
		{
			System.out.print("Guess my name, enter your full name: ");
			guessedName = sc.nextLine();
			if (guessedName.startsWith(" ") || guessedName.endsWith(" "))
				guessedName = guessedName.trim();
		} while (!guessedName.contains(" "));
		if (nameToGuess.equals(guessedName))
			System.out.println("Perfect match");
		else if (nameToGuess.equalsIgnoreCase(guessedName))
			System.out.println("Almost perfect match");
		else if (nameToGuess.length() > guessedName.length())
			System.out.println("Guess too short");
		else if (guessedName.length() > nameToGuess.length())
			System.out.println("Guess too long");
		else
		{
			int spaceIndex = guessedName.indexOf(" ");
			String reversedGuessedName = "";
			for (int i = spaceIndex + 1;i < guessedName.length();i++)
				reversedGuessedName += guessedName.charAt(i);
			reversedGuessedName += " ";
			for (int i = 0;i < spaceIndex;i++)
				reversedGuessedName += guessedName.charAt(i);
			if (nameToGuess.equalsIgnoreCase(reversedGuessedName))
				System.out.println("Reversed match");
		}
		
		System.out.println("The name was: ");
		int spaceIndex = nameToGuess.indexOf(" ");
		String firstPart = nameToGuess.substring(0, spaceIndex).toUpperCase();
		String secondPart = nameToGuess.substring(spaceIndex + 1).toLowerCase();
		System.out.println(firstPart);
		System.out.println(secondPart);
		String spaceToUnder = nameToGuess.replace(" ", "_");
		System.out.println(spaceToUnder);
		
		sc.close();
	}
}'); ?>
</pre>
</details>
<!-- QUESTION 6 END -->
<!-- QUESTION 7 START -->
<h3>שאלה 7</h3>
<div>
כתבו תכנית הקולטת מהמשתמש מספר בין 1-5 (יש לאמת זאת) המייצג את מספר המשולשים עבורם יש לחשב את השטח הכולל.<br>
עבור כל משולש יש לקלוט את גובהו ואורך בסיסו (יש לאמת ערכים חיוביים בלבד), את משתנים אלה יש לשלוח כפרמטים למתודה triangleArea שתחשב את השטח בנפרד עבור כל משולש.<br>
התכנית תדפיס בנפרד את שטחו של כל משולש, ולבסוף את השטח הכולל של כל המשולשים.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
<span>
Enter how many triangles are the to be calculated (1-5): <span class="green">11</span><br>
Wrong, (1-5)!<br>
Enter how many triangles are the to be calculated (1-5): <span class="green">2</span><br>
Enter the height of triangle No.1 : <span class="green">-3</span><br>
Wrong, must be a positive number!<br>
Enter the height of triangle No.1 : <span class="green">4</span><br>
Enter the base of triangle No.1 : <span class="green">5</span><br>
Area of triangle No.1 is 10.<br>
Enter the height of triangle No.2 : <span class="green">3</span><br>
Enter the base of triangle No.2 : <span class="green">8</span><br>
Area of triangle No.1 is 12.<br>
The Area of all of the triangles is 22.
</span>
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('import java.util.Scanner;

public class Targil7
{
	public static void main(String[] args)
	{
		Scanner sc = new Scanner(System.in);
		
		int numTriangles;
		do
		{
			System.out.print("Enter how many triangles are the to be calculated (1-5): ");
			numTriangles = sc.nextInt();
			if (numTriangles < 1 || numTriangles > 5)
				System.out.println("Wrong, (1-5)!");
		} while (numTriangles < 1 || numTriangles > 5);
		
		int totalArea = 0;
		for (int i = 1;i <= numTriangles;i++)
		{
			int height;
			int base;
			do
			{
				System.out.print("Enter the height of triangle No." + i + " : ");
				height = sc.nextInt();
				if (height < 1)
					System.out.println("Wrong, must be a positive number!");
			} while (height < 1);
			do
			{
				System.out.print("Enter the base of triangle No." + i + " : ");
				base = sc.nextInt();
				if (base < 1)
					System.out.println("Wrong, must be a positive number!");
			} while (base < 1);
			
			int area = triangleArea(height, base);
			System.out.println("Area of triangle No." + i + " is " + area + ".");
			
			totalArea += area;
		}
		System.out.println("The Area of all of the triangles is " + totalArea + ".");
		
		sc.close();
	}
	
	public static int triangleArea(int height, int base)
	{
		return (height * base) / 2;
	}
}'); ?>
</pre>
</details>
<!-- QUESTION 7 END -->
<!-- QUESTION 8 START -->
<h3>שאלה 8</h3>
<div>
כתבו תוכנית הקולטת סדרה של מספרים שלמים גדולים מ-0 (אם יש קלט שגוי, דלגו עליו), התוכנית תבדוק אם המספר הוא פלינדרום, ומדפיסה למסך את התשובה.<br>
מספר הוא פלינדרום אם מתקבל אותו מספר בקריאה משמאל לימין וגם מימין לשמאל.<br>
כל מספר בסדרה צריך להיבדק בנפרד ע"י המתודה isPalindrome.<br>
התכנית תעצר כאשר היא תקבל את הקלט 0.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
<span>
Enter a positive integer to check for Palindrome: <span class="green">8888</span><br>
The number 8888 is palindrome.<br>
Enter a positive integer to check for Palindrome: <span class="green">9</span><br>
The number 9 is palindrome.<br>
Enter a positive integer to check for Palindrome: <span class="green">121</span><br>
The number 121 is palindrome.<br>
Enter a positive integer to check for Palindrome: <span class="green">579975</span><br>
The number 579975 is palindrome.<br>
Enter a positive integer to check for Palindrome: <span class="green">2332</span><br>
The number 2332 is palindrome.<br>
Enter a positive integer to check for Palindrome: <span class="green">234</span><br>
The number 234 is not a palindrome.
</span>
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('import java.util.Scanner;

public class Targil8
{
	public static void main(String[] args)
	{
		Scanner sc = new Scanner(System.in);
		int number;
		do
		{
			System.out.print("Enter a positive integer to check for Palindrome: ");
			number = sc.nextInt();
			if (number > 0)
			{
				if (isPalindrome(number))
					System.out.println("The number " + number + " is palindrome.");
				else
					System.out.println("The number " + number + " is not a palindrome.");
			}
		} while (number != 0);
		
		sc.close();
	}
	
	public static boolean isPalindrome(int number)
	{
		int palindrome = number;
		int reverse = 0;
		while (palindrome != 0)
		{
			int remainder = palindrome % 10;
			
			reverse = reverse * 10 + remainder;
			palindrome /= 10;
		}
		
		return number == reverse;
	}
}'); ?>
</pre>
</details>
<!-- QUESTION 8 END -->
<!-- QUESTION 9 START -->
<h3>שאלה 9</h3>
<div>
נגדיר שלשה פיתגורית: שלשת מספרים (שלמים וחיוביים) סדורה: c,a,b כך ש- a*a+b*b=c*c.<br>
כתבו תוכנית אשר מקבלת כקלט פרמטר מספר חיובי k בין 10-100 (הניחו קלט תקין).<br>
על התוכנית להדפיס את כל השלשות הפיתגוריות a,b,c כך ש:<br>
c&lt;=k. (שימו לב כי מעצם קיום המשוואה, חייב להתקיים כי c&gt;a,b).<br>
על כל שלשה להיות מודפסת פעם אחת בלבד, בשורה משלה!<br>
מציאת והדפסת השלשות תיעשה על ידי מתודה בשם pythagorianTriplets.<br>
במידה ואין כלל שלשות פיתגוריות העונות על הדרישות, ההודעה הבאה תודפס על המסך:<br>
No pitagorian triplets found!
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
<span>
Please enter a number between 10 and 100: <span class="green">20</span><br>
Found triplet: (3, 4, 5)<br>
Found triplet: (6, 8, 10)<br>
Found triplet: (5, 12, 13)<br>
Found triplet: (9, 12, 15)<br>
Found triplet: (8, 15, 17)<br>
Found triplet: (12, 16, 20)
</span>
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('import java.util.Scanner;

public class Targil9
{
	public static void main(String[] args)
	{
		Scanner sc = new Scanner(System.in);
		System.out.print("Please enter a number between 10 and 100: ");
		int k = sc.nextInt();
		pythagorianTriplets(k);
		
		sc.close();
	}
	
	public static void pythagorianTriplets(int k)
	{
		boolean foundTriplet = false;
		for (int c = 1;c <= k;c++)
		{
			for (int a = 1;a < c;a++)
			{
				for (int b = a;b < c;b++)
				{
					if (a * a + b * b == c * c)
					{
						System.out.println("Found triplet: (" + a + ", " + b + ", " + c + ")");
						foundTriplet = true;
					}
				}
			}
		}
		if (!foundTriplet)
			System.out.println("No pitagorian triplets found!");
	}
}'); ?>
</pre>
</details>
<!-- QUESTION 9 END -->
<!-- QUESTION 10 START -->
<h3>שאלה 10</h3>
<div>
כתבו תכנית המחשבת את השורשים הממשיים של המשואה הריבועית:<br>
<span>ax^2 + bx + c = 0</span>
a, b, c הם מספרים ממשיים.<br>
התוכנית תקלוט מהמשתמש ב main את ערכי המקדמים ותדפיס פלט בעזרת האלגוריתם הבא שימומש באמצעות פונקצית העזר calcQuadraticEquation:<br>
<br>
אלגוריתם לחישוב השורשים הממשיים של משואה ריבועית:<br>
ע"פ ערכי המקדמים a, b, c תודפס רק אחת מאפשרויות הפלט הבאות:<br>
<br>
1. a=0 b!=0 הפתרון הוא -c מחולק ב b.<br>
2. a=0 b=0 c!=0 המשואה לא חוקית, אין פתרון.<br>
3. a=0 b=0 c=0 יש אינסוף פתרונות.<br>
4. a!=0 b^2 - 4ac &lt; 0 אין פתרון ממשי.<br>
5. a!=0 b^2 - 4ac = 0 הפתרון הוא -b מחולק ב- 2a.<br>
6. a!=0 b^2 - 4ac &gt; 0 שני פתרונות:<br>
<br>
הפתרון הראשון – <br>
<span>(-b + square root of (b^2 - 4ac)) / 2a</span><br>
הפתרון השני – <br>
<span>(-b - square root of (b^2 - 4ac)) / 2a</span><br>
<br>
כדי לחשב שורש ריבועי השתמשו בשיטה Math.sqrt.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
<span>
Please enter a,b,c to calculate result for: ax^2 + bx + c = 0<br>
<span class="green">
1<br>
1<br>
-2<br>
</span>
There are two solutions to this equation:<br>
1) 1.0<br>
2) -2.0
</span>
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('import java.util.Scanner;

public class Targil10
{
	public static void main(String[] args)
	{
		Scanner sc = new Scanner(System.in);
		System.out.println("Please enter a,b,c to calculate result for: ax^2 + bx + c = 0");
		double a = sc.nextDouble();
		double b = sc.nextDouble();
		double c = sc.nextDouble();
		calcQuadraticEquation(a, b, c);
		
		sc.close();
	}
	
	public static void calcQuadraticEquation(double a, double b, double c)
	{
		if (a == 0)
		{
			if (b != 0)
				System.out.println("Solution is: " + (-c / b));
			else if (c != 0)
				System.out.println("This equation is illegal.");
			else
				System.out.println("There are infinite solutions.");
		}
		else
		{
			double toSqrt = Math.pow(b, 2) - 4 * a * c;
			if (toSqrt < 0)
				System.out.println("There is no solution (cannot make sqrt root of negative number).");
			else if (toSqrt == 0)
				System.out.println("Solution is: " + (-b / (2 * a)));
			else
			{
				System.out.println("There are two solutions to this equation:");
				System.out.println("1) " + ((-b + Math.sqrt(toSqrt)) / (2 * a)));
				System.out.println("2) " + ((-b - Math.sqrt(toSqrt)) / (2 * a)));
			}
		}
	}
}'); ?>
</pre>
</details>
<!-- QUESTION 10 END -->
<!-- QUESTION 11 START -->
<h3>שאלה 11</h3>
<div>
המתודה switchArrays הינה מתודה המקבלת שני מערכים של מספרים שלמים בגודל זהה (אותו מספר איברים בכל מערך).<br>
המתודה מחליפה בין המערכים באופן הבא: למערך הראשון היא מכניסה את כל איברי המערך השני בסדר הפוך, ולמערך השני היא מכניסה את כל איברי המערך הראשון בסדר הפוך.<br>
המתודה תחזיר את המערך שנקבע בהגרלה רנדומאלית בטווח של 1-2, אם יוצא 1 המערך הראשון מוחזר, אם יוצא 2 המערך השני מוחזר.<br>
כתבו את התכנית והמתודה המממשת פעולה זו.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
לדוגמה אם המערכים הם:<br>
<pre>A={2,4,6,8}, B={1,3,5,7}</pre>
אחרי פעולת הפונקציה, המערכים יהיו:<br>
<pre>A={7,5,3,1}, B={8,6,4,2}</pre>
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('import java.util.Random;

public class Targil11
{
	public static void main(String[] args)
	{
		int[] a = {2, 4, 6, 8};
		int[] b = {1, 3, 5, 7};
		int[] c = switchArrays(a, b);
		for (int i = 0;i < c.length;i++)
			System.out.print(c[i] + " ");
	}
	
	public static int[] switchArrays(int[] a, int[] b)
	{
		int[] temp = new int[a.length];
		System.arraycopy(a, 0, temp, 0, a.length);
		for (int i = b.length - 1;i >= 0;i--)
			a[b.length - i - 1] = b[i];
		for (int i = temp.length - 1;i >= 0;i--)
			b[temp.length - i - 1] = temp[i];
		
		Random rnd = new Random();
		if (rnd.nextInt(2) + 1 == 1)
			return a;
		
		return b;
	}
}'); ?>
</pre>
</details>
<!-- QUESTION 11 END -->
<!-- QUESTION 12 START -->
<h3>שאלה 12</h3>
<div>
המתודה checkEqualityInArrays הינה מתודה המקבלת שני מערכים של מספרים שלמים בגודל זהה (אותו מספר איברים בכל מערך), כאשר ניתן להניח כי בכל מערך איברי המערך שונים זה מזה, ונותנת הערכה מספרית לעד כמה שתי המערכים דומים אחד לשני, בכך שהיא מבצעת את הפעולות הבאות: אם בשני המערכים ישנם ערכים זהים בתאים עם אותו מיקום, להערכה נוספים 10 נקודות, אם לשני המערכים ישנם ערכים זהים אך בתאים עם מיקום שונה, להערכה נוספים 5 נקודות.<br>
כל שני מערכים שעוברים את רף ה100 נקודות שוויון, מקבלים בונוס 30 נק' הערכה. בונוס זה הינו חד פעמי ולא חוזר על עצמו במקרה של מעבר נוסף של 100 הנקודות (לדוגמה עבור 210 נקודות שוויון, יהיה בונוס של 30 נק' בלבד).<br>
כתבו את התכנית והמתודה המממשת פעולה זו.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
דוגמה להערכת שני מערכים, עבור:<br>
<pre>
A = {22,14,23,34,45}
B = {22,14,28,45,44}
</pre>
ניקוד הערכת השוויון יהיה 25.
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('public class Targil12
{
	public static void main(String[] args)
	{
		int[] a = {22, 14, 23, 34, 45};
		int[] b = {22, 14, 28, 45, 44};
		checkEqualityInArrays(a, b);
	}
	
	public static void checkEqualityInArrays(int[] a, int[] b)
	{
		int points = 0;
		for (int i = 0;i < a.length;i++)
		{
			for (int j = 0;j < b.length;j++)
			{
				if (a[i] == b[j])
				{
					if (i == j)
						points += 10;
					else
						points += 5;
				}
			}
		}
		if (points > 100)
			points += 30;
		
		System.out.println("The equality value for the arrays is: " + points);
	}
}'); ?>
</pre>
</details>
<!-- QUESTION 12 END -->
<!-- QUESTION 13 START -->
<h3>שאלה 13</h3>
<div>
נתונים שני מערכים: action בגודל 18 ו – result בגודל 6.<br>
במערך action מאוחסנים שש שלשות של מספרים שלמים. המספר הראשון  בכל שלשה מייצג קוד של פעולה  המתבצעת על שני המספרים הבאים אחריו.<br>
הקודים  האפשריים:<br>
המספר 1 מייצג את פעולת החיבור , המספר 2 מייצג את פעולת החיסור.<br>
כתוב תכנית המקבלת  כקלט את מערך action. על התכנית לבצע את הפעולות הנדרשות בהתאם  לקודים ולאחסן את התוצאות במערך result.<br>
פלט התכנית: הדפסת שני המערכים.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
<span>
Please enter 1 to sum the next 2 numbers or 2 to sub them: <span class="green">2</span><br>
Please enter a number: <span class="green">31</span><br>
Please enter a number: <span class="green">11</span><br>
Please enter 1 to sum the next 2 numbers or 2 to sub them: <span class="green">1</span><br>
Please enter a number: <span class="green">-40</span><br>
Please enter a number: <span class="green">10</span><br>
Please enter 1 to sum the next 2 numbers or 2 to sub them: <span class="green">2</span><br>
Please enter a number: <span class="green">2</span><br>
Please enter a number: <span class="green">2</span><br>
Please enter 1 to sum the next 2 numbers or 2 to sub them: <span class="green">2</span><br>
Please enter a number: <span class="green">2</span><br>
Please enter a number: <span class="green">2</span><br>
Please enter 1 to sum the next 2 numbers or 2 to sub them: <span class="green">1</span><br>
Please enter a number: <span class="green">2</span><br>
Please enter a number: <span class="green">3</span><br>
Please enter 1 to sum the next 2 numbers or 2 to sub them: <span class="green">2</span><br>
Please enter a number: <span class="green">3</span><br>
Please enter a number: <span class="green">3</span><br>
The action array was:<br>
2 31 11 1 -40 10 2 2 2 2 2 2 1 2 3 2 3 3 <br>
The result array is:<br>
20 -30 0 0 5 0 
</span>
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('import java.util.Scanner;

public class Targil13
{
	public static void main(String[] args)
	{
		Scanner sc = new Scanner(System.in);
		int[] action = new int[18];
		int[] result = new int[6];
		for (int i = 0;i < action.length;i++)
		{
			if (i % 3 == 0)
				System.out.print("Please enter 1 to sum the next 2 numbers or 2 to sub them: ");
			else
				System.out.print("Please enter a number: ");
			
			action[i] = sc.nextInt();
		}
		for (int i = 0;i < result.length;i++)
		{
			int j = i * 3;
			if (action[j] == 1)
				result[i] = action[j + 1] + action[j + 2];
			else
				result[i] = action[j + 1] - action[j + 2];
		}
		System.out.println("The action array was:");
		for (int i = 0;i < action.length;i++)
			System.out.print(action[i] + " ");
		System.out.println();
		System.out.println("The result array is:");
		for (int i = 0;i < result.length;i++)
			System.out.print(result[i] + " ");
		
		sc.close();
	}
}'); ?>
</pre>
</details>
<!-- QUESTION 13 END -->
<!-- QUESTION 14 START -->
<h3>שאלה 14</h3>
<div>
סדרה הנדסית הינה סדרה שבה המנה בין כל שני איברים עוקבים הינו קבוע.<br>
לדוגמה, הסדרה הבאה היא סדרה הנדסית: 1,2,4,8,16,32,64,128<br>
כאשר האיבר הראשון הוא a<sub>1</sub> = 1 ומנת הסדרה היא q = 2.<br>
כתבו תכנית המקבלת מהמשתמש את האיבר בראשון a, מנת הסדרה q ומיקום n ומדפיסה את כל המספרים בסדרה ההנדסית עד למיקום ה-n.<br>
יש לבדוק כי המשתמש הזין מנה חוקית (q != 1) וכי האינדקס חוקי (גדול מ-0) במידה והערך לא תקין עליכם להדפיס הודעת שגיאה ולהמשיך לבקש קלט עד שייתקבל קלט תקין.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
<span>
Please enter the first element in the series: <span class="green">1</span><br>
Please enter the dose between elements: <span class="green">1</span><br>
The dose cannot be 1.<br>
Please enter the dose between elements: <span class="green">2</span><br>
Please enter the amount of elements in the series: <span class="green">-3</span><br>
The amount of elements must be bigger than 0.<br>
Please enter the amount of elements in the series: <span class="green">8</span><br>
1 2 4 8 16 32 64 128
</span>
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('import java.util.Scanner;

public class Targil14
{
	public static void main(String[] args)
	{
		Scanner sc = new Scanner(System.in);
		System.out.print("Please enter the first element in the series: ");
		int a = sc.nextInt();
		int q;
		int n;
		do
		{
			System.out.print("Please enter the dose between elements: ");
			q = sc.nextInt();
			if (q == 1)
				System.out.println("The dose cannot be 1.");
		} while (q == 1);
		do
		{
			System.out.print("Please enter the amount of elements in the series: ");
			n = sc.nextInt();
			if (n < 1)
				System.out.println("The amount of elements must be bigger than 0.");
		} while (n < 1);
		sc.close();
		
		for (int i = 0;i < n;i++)
		{
			System.out.print(a + " ");
			
			a *= q;
		}
	}
}'); ?>
</pre>
</details>
<!-- QUESTION 14 END -->
<!-- QUESTION 15 START -->
<h3>שאלה 15</h3>
<div>
כתוב תכנית הקולטת מספר בין 1-10 (עליכם לוודא זאת) ומדפיסה את כל המספרים בין 1 ל-1000 אשר סכום הספרות שלהם הינו המספר שנקלט.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
<span>
Please enter a number between 1-10: <span class="green">-3</span><br>
Please enter a number between 1-10: <span class="green">11</span><br>
Please enter a number between 1-10: <span class="green">2</span><br>
2 11 20 101 110 200
</span>
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('import java.util.Scanner;

public class Targil15
{
	public static void main(String[] args)
	{
		Scanner sc = new Scanner(System.in);
		int num;
		do
		{
			System.out.print("Please enter a number between 1-10: ");
			num = sc.nextInt();
		} while (num < 1 || num > 10);
		sc.close();
		
		for (int i = 1;i < 1000;i++)
		{
			int copy = i;
			int sum = 0;
			while (copy > 0)
			{
				sum += (copy % 10);
				copy /= 10;
			}
			if (sum == num)
				System.out.print(i + " ");
		}
	}
}'); ?>
</pre>
</details>
<!-- QUESTION 15 END -->
<!-- QUESTION 16 START -->
<h3>שאלה 16</h3>
<div>
כתבו את המתודה:<br>
<pre><?php echo showCode('isPrime(int num)'); ?></pre>
המקבלת מספר שלם גדול מ-1 ומחזירה האם המספר ראשוני או לא.<br>
כתבו את המתודה:<br>
<pre><?php echo showCode('largestPrimesAverage(int num, int k)'); ?></pre>
המקבלת מספר שלם גדול מ-1 ומספר k נוסף גדול מ-0.<br>
המתודה תחזיר את הממוצע של k המספרים הראשוניים הגדולים ביותר שקטנים ממש מ - num.<br>
במידה וקיימים פחות מ- k מספרים ראשוניים הקטנים ממש מ- num על המתודה להחזיר את הממוצע שלהם.<br>
במתודה זו יש להשתמש במתודה isPrime שיצרתם קודם לכן על מנת לבדוק אם מספר הוא ראשוני.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
דוגמאות:<br>
<pre>
isPrime(7) => true
isPrime(12) => false
<br>
largestPrimesAverage(8, 3) => 5.0 // (7+5+3)/3 = 5.0
largestPrimesAverage(8, 1) => 7.0 // 7/1 = 7.0
largestPrimesAverage(7, 3) => 3.3333… // (5+3+2)/3 = 3.33…
largestPrimesAverage(20, 5) => 13.4 // (19+17+13+11+7)/5 = 13.4
largestPrimesAverage(12, 7) => 5.6 // (11+7+5+3+2)/5 = 5.6
</pre>
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('public static boolean isPrime(int num)
{
	for (int i = 2;i < num / 2 + 1;i++)
		if (num % i == 0)
			return false;
	
	return true;
}

public static double largestPrimesAverage(int num, int k)
{
	int sum = 0;
	int count = 0;
	for (int i = num - 1;i >= 2 && count < k;i--)
	{
		if (isPrime(i))
		{
			sum += i;
			count++;
		}
	}
	
	return (double) sum / count;
}'); ?>
</pre>
</details>
<!-- QUESTION 16 END -->
<!-- QUESTION 17 START -->
<h3>שאלה 17</h3>
<div>
יהי A מערך של מספרים שלמים שונים (לא ממוין).<br>
כתבו מתודה המקבלת מערך A ומחזירה true אם ורק אם:<br>
<pre>∀x: 0≤x&lt;n ∃y: 0≤y&lt;n ∧ y≠x: A[x] &gt; A[y] - 10</pre>
למתודה צריכה להיות החתימה הבאה:<br>
<pre><?php showCode('public static boolean forAllExists(int[] a)'); ?></pre>
חישבו מה יש להחזיר במידה והמערך ריק או הינו יחידון (מכיל תא אחד בלבד).
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
בהינתן הקלט:<br>
<pre>A = {1, 2, 5, 7, 9, 3}</pre>
הפלט שיתקבל יהיה true.<br>
בהינתן הקלט:<br>
<pre>A = {1, 20, 40 , 60}</pre>
הפלט שיתקבל יהיה false.
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('public static boolean forAllExists(int[] a)
{
	if (a.length < 2)
		return false;
	
	for (int x = 0;x < a.length;x++)
	{
		boolean exists = false;
		for (int y = 0;y < a.length && !exists;y++)
		{
			if (y != x)
			{
				if (a[x] > a[y] - 10)
					exists = true;
			}
		}
		if (!exists)
			return false;
	}
	
	return true;
}'); ?>
</pre>
</details>
<!-- QUESTION 17 END -->
<!-- QUESTION 18 START -->
<h3>שאלה 18</h3>
<div>
יהי A מערך של מספרים שלמים שונים (לא ממוין).<br>
כתבו מתודה המקבלת מערך A ומחזירה true אם ורק אם:<br>
<pre>∃x: 0≤x&lt;n ∀y: 0≤y&lt;n ∧ y≠x: A[y] - 10 &lt; A[x] &lt; A[y] + 10</pre>
למתודה צריכה להיות החתימה הבאה:<br>
<pre><?php showCode('public static boolean existsForAll(int[] a)'); ?></pre>
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
בהינתן הקלט:<br>
<pre>A = {1, 6, 15, 12}</pre>
הפלט שיתקבל יהיה true.<br>
בהינתן הקלט:<br>
<pre>A = {1, 20, 40 , 60}</pre>
הפלט שיתקבל יהיה false.
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('public static boolean existsForAll(int[] a)
{
	for (int x = 0;x < a.length;x++)
	{
		boolean existForAll = true;
		for (int y = 0;y < a.length && existForAll;y++)
		{
			if (y != x)
			{
				if (a[y] - 10 >= a[x])
					existForAll = false;
				else if (a[x] >= a[y] + 10)
					existForAll = false;
			}
		}
		if (existForAll)
			return true;
	}
	
	return false;
}'); ?>
</pre>
</details>
<!-- QUESTION 18 END -->
<!-- QUESTION 19 START -->
<h3>שאלה 19</h3>
<div>
יש לכתוב שיטה המקבלת שתי מחרוזות ומדפיסה שתי מחרוזות חדשות אחרות שהן אלו:<br>
המחרוזת החדשה הראשונה מורכבת ממחציתה השנייה של המחרוזת הראשונה ומחציתה הראשונה של המחרוזת השנייה.<br>
המחרוזת החדשה השנייה מורכבת ממחציתה הראשונה של המחרוזת הראשונה וממחציתה השנייה של המחרוזת השנייה.<br>
לאחר הדפסת שתי המחרוזות החדשות, השיטה תדפיס את כל המספרים מ1 עד אורך שתי המחרוזות ביחד באותה שורה.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
לדוגמה, עבור קלט של המחרוזות bear, me  התוכנית תדפיס:<br>
<pre>
arm
bee
1 2 3 4 5 6 
</pre>
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('public static void changeAndPrint(String a, String b)
{
	String new1 = a.substring(a.length() / 2, a.length()) + b.substring(0, b.length() / 2);
	String new2 = a.substring(0, a.length() / 2) + b.substring(b.length() / 2, b.length());
	System.out.println(new1);
	System.out.println(new2);
	for (int i = 1;i <= new1.length() + new2.length();i++)
		System.out.print(i + " ");
}'); ?>
</pre>
</details>
<!-- QUESTION 19 END -->
<!-- QUESTION 20 START -->
<h3>שאלה 20</h3>
<div>
יש לכתוב שיטה המקבלת מחרוזת. השיטה מדפיסה כפלט את המחרוזת ללא אותיות זהות צמודות.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
עבור הקלט: apple הפלט יהיה aple.<br>
עבור הקלט: Yellow balloon הפלט יהיה Yelow balon.<br>
עבור הקלט: abbba הפלט יהיה aba.
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('public static void removeAndPrint(String s)
{
	String newS = s.substring(0, 1);
	for (int i = 1;i < s.length();i++)
		if (s.charAt(i) != s.charAt(i - 1))
			newS += s.charAt(i);
	
	System.out.println(newS);
}'); ?>
</pre>
</details>
<!-- QUESTION 20 END -->
<!-- HALAMISH 1 START -->
<h3>חלמיש 1</h3>
<div>
נתונה המתודה בעלת החתימה הבאה:<br>
<pre><?php showCode('public static int how_many(int[] array, int value)'); ?></pre>
המתודה סופרת כמה פעמים הערך value מופיע במערך array, כתבו את המתודה.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
לדוגמה עבור המערך 21 12 1 2 1 2 1 והמספר 1 המתודה תחזיר 3.
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('public static int how_many(int[] array, int value)
{
	int count = 0;
	for (int var : array)
		if (var == value)
			count++;
	
	return count;
}'); ?>
</pre>
</details>
<!-- HALAMISH 1 END -->
<!-- HALAMISH 2 START -->
<h3>חלמיש 2</h3>
<div>
נתונה המתודה בעלת החתימה הבאה:<br>
<pre><?php showCode('public static boolean is_diff(int[] arr1, int[] arr2, int k)'); ?></pre>
אשר מקבלת שני מערכים עם מספרים שלמים בסדר עולה ומספר k כלשהו.<br>
המתודה תחזיר אמת אם קיימים שני איברים במערך הראשון והשני כך ש- arr1[i] - arr2[j] = k.<br>
שימו לב שהערך הראשון צריך להיות דווקא מהמערך הראשון והערך השני דווקא מעמרך השני, ולא להיפך.<br>
במידה ולא קיימים שני איברים כאלו המתודה תחזיר שקר.<br>
כתבו את המתודה. 
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
לדוגמא , עבור המערכים:<br>
<pre>
arr1 = {1, 5, 8, 20}
arr2 = {2, 15, 21}
</pre>
המתודה תחזיר אמת עבור k = 5 ושקר עבור k = 4.
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('public static boolean is_diff(int[] arr1, int[] arr2, int k)
{
	for (int i = 0;i < arr1.length;i++)
		for (int j = 0;j < arr2.length;j++)
			if (arr1[i] - arr2[j] == k)
				return true;
	
	return false;
}'); ?>
</pre>
</details>
<!-- HALAMISH 2 END -->
<!-- HALAMISH 3 START -->
<h3>חלמיש 3</h3>
<div>
<u>סעיף א</u><br>
נתון הקטע קוד הבא:<br>
<pre>
<?php showCode('public static int secret(int a, int b)
{
	while (a >= b)
		a -= b;
	
	return a;
}'); ?>
</pre>
מה משמעות הערך שהפונקציה מחזירה כשהיא מקבלת a ו- b חיוביים? נמקו בקצרה.<br>
כמו-כן, תנו דוגמא לערכי a ו- b שעבורם תיווצר לולאה אינסופית. 
</div>
<details>
<summary>הצג פתרון</summary>
<div>
משמעות הערך שהמתודה מחזירה הוא שארית החלוקה של a ב- b.<br>
מחסרים את b מ- a עד אשר a נהיה קטן מ- b ואז יודעים שמה שיש כרגע ב-a הוא שארית החלוקה.<br>
תהיה לולאה אינסופית עבור a > 0, b = 0.
</div>
</details>
<div>
<u>סעיף ב</u><br>
נתון הקטע קוד הבא:<br>
<pre>
<?php showCode('public static boolean secret(int n)
{
	while (n > 1)
	{
		if (n % 2 == 1)
			return false;
		
		n /= 2;
	}
	
	return true;
}'); ?>
</pre>
מה עושה המתודה? נמקו בקצרה.
</div>
<details>
<summary>הצג פתרון</summary>
<div>
בהנחה ש n חיובי, המתודה בודקת האם המספר הוא חזקה של 2.
</div>
</details>
<div>
<u>סעיף ג</u><br>
נתון הקטע קוד הבא:<br>
<pre>
<?php showCode('import java.util.Scanner;

public class Halamish3
{
	public static void main(String[] args)
	{
		Scanner sc = new Scanner(System.in);
		int a[] = new int[10];
		int n = sc.nextInt();
		for (int i = 0;i <= n;i++)
			a[i] = i;
		sc.close();
	}
}'); ?>
</pre>
מה הבעיה בתוכנית הזאת?<br>
אפיינו את הבעיה - קומפילציה או זמן ריצה, הסבירו ותקנו את הטעות.
</div>
<details>
<summary>הצג פתרון</summary>
<div>
הבעיה היא שעבור כל n גדול מ-9 התכנית תנסה לגשת לתא במערך שלא קיים (מחוץ לטווח של 10 תאים שהוגדרו).<br>
טעות זו היא טעות זמן ריצה, כיוון שרק בהרצת התכנית ובהינתן קלט גדול מ-9 התכנית תצא עם שגיאה, ע"מ לתקן את הטעות יש להגביל את n למקסימום 9, או לחלופין לעשות שהמערך יהיה בעל n תאים ואז לרוץ מ-0 עד n (לא כולל).
</div>
</details>
<!-- HALAMISH 3 END -->
<!-- HALAMISH 4 START -->
<h3>חלמיש 4</h3>
<div>
מספר שלם חיובי יקרא "עולה" אם הספרות בו הן בערך עולה בהסתכלות מימין לשמאל.<br>
מספר שלם חיובי יקרא "יורד" אם הספרות בו הן בערך יורד בהסתכלות מימין לשמאל.<br>
מספר שלם חיובי יקרא "יציב" אם הספרות בו אינן שומרות על ערך עולה או יורד דווקא.<br>
ממשו את המתודה:<br>
<pre><?php showCode('public static int upDown(int n1)'); ?></pre>
המקבלת מספר שלם וחיובי, המתודה מחזירה 1 אם המספר עולה, 1- אם המספר יורד ו-0 אם הוא יציב.
</div>
<details>
<summary>הצג דוגמת הרצה</summary>
<div>
לדוגמה:<br>
המספר 9764211 הוא עולה,<br>
המספר 24566778 הוא יורד,<br>
המספר 5124986 הוא יציב. 
</div>
</details>
<details>
<summary>הצג פתרון</summary>
<div>
<pre>
<?php showCode('public static int upDown(int n1)
{
	boolean isUp = true;
	boolean isDown = true;
	
	int previousRemainder = n1 % 10;
	n1 /= 10;
	
	while (n1 > 0)
	{
		int remainder = n1 % 10;
		if (remainder < previousRemainder)
			isUp = false;
		else if (remainder > previousRemainder)
			isDown = false;
		
		if (!isUp && !isDown)
			return 0;
		
		previousRemainder = remainder;
		n1 /= 10;
	}
	
	return isUp ? 1 : -1;
}'); ?>
</pre>
</div>
</details>
<!-- HALAMISH 4 END -->
<!-- HALAMISH 5 START -->
<h3>חלמיש 5</h3>
<div>
מה יהיה הפלט של הקטע קוד הבא?
<pre>
<?php showCode('public class Halamish5
{
	static int x = 3;
	
	public static void main(String[] args)
	{
		for (int i = 0;i < 3;i++)
			System.out.println(fun(i * x));
	}
	
	public static int fun(int a)
	{
		x = 2;
		
		return a + fan(x);
	}
	
	public static int fan(int b)
	{
		int x = 1 + b;
		
		return b * x;
	}
}'); ?>
</pre>
</div>
<details>
<summary>הצג פתרון</summary>
<div>
6<br>
8<br>
10
</div>
</details>
<!-- HALAMISH 5 END -->
<!-- HALAMISH 6 START -->
<h3>חלמיש 6</h3>
<div>
ציין ע"פ הקטע הבא עבור אליו ערכים של e1,e2,e3 (true / false) יתבצע כל אחת מההדפסות.
<pre>
<?php showCode('if (e1 && e2)
	if (!(e2 && e3))
		System.out.println("s1");
	else if (e2 || e3)
		if (e1)
			System.out.println("s2");
		else if (e1 || !e2);
		else
			System.out.println("s3");'); ?>
</pre>
</div>
<details>
<summary>הצג פתרון</summary>
<div>
עבור e1,e2 = true ו- e3 = false התכנית תדפיס s1.<br>
עבור e1,e2,e3 = true התכנית תדפיס s2.<br>
אין תנאי שייקים את s3.
</div>
</details>
<!-- HALAMISH 6 END -->
<!-- HALAMISH 7 START -->
<h3>חלמיש 7</h3>
<div>
נתונים 3 משתנים a,b,c כתוב קטע של תכנית, יעילה ככל האפשר, המדפיסה אותם ע"פ סדר עולה, בלי שימוש במשתנים נוספים ובאמצעות if ו- else בלבד.
</div>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('	if (a > b)
	{
		if (b > c)
			System.out.println(a + " " + b + " " + c);
		else if (a > c)
			System.out.println(a + " " + c + " " + b);
		else
			System.out.println(c + " " + a + " " + b);
	}
	else
	{
		if (a > c)
			System.out.println(b + " " + a + " " + c);
		else if (b > c)
			System.out.println(b + " " + c + " " + a);
		else
			System.out.println(c + " " + b + " " + a);
	}'); ?>
</pre>
</details>
<!-- HALAMISH 7 END -->
<!-- HALAMISH 8 START -->
<h3>חלמיש 8</h3>
<div>
נתון מערך של מספרים שלמים בגודל n, כתוב מתודה ההופכת את סדרו, בעזרת משתנה עזר אחד בלבד.<br>
קחו בחשבון ש-n יכול להיות מספר זוגי או אי זוגי.
</div>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('public static void reverse(int[] arr)
{
	for (int i = 0;i < arr.length / 2;i++)
	{
		int temp = arr[arr.length - i - 1];
		arr[arr.length - i - 1] = arr[i];
		arr[i] = temp;
	}
}'); ?>
</pre>
</details>
<!-- HALAMISH 8 END -->
<!-- HALAMISH 9 START -->
<h3>חלמיש 9</h3>
<div>
כתוב תכנית הקולטת שני מערכים ממויינים בסדר עולה, בכל מערך 5 מספרים.<br>
התכנית מדפיסה את כל איברי המערכים בצורה ממויינת, ניתן להניח כי כל המספרים שונים זה מזה.
</div>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('public class Halamish9
{
	public static void main(String[] args)
	{
		Scanner sc = new Scanner(System.in);
		int[] arr1 = new int[5];
		int[] arr2 = new int[5];
		System.out.println("Please enter 5 numbers for the first array in raising order.");
		for (int i = 0;i < arr1.length;i++)
			arr1[i] = sc.nextInt();
		System.out.println("Please enter 5 numbers for the second array in raising order.");
		for (int i = 0;i < arr2.length;i++)
			arr2[i] = sc.nextInt();
		sc.close();
		
		int x = 0;
		int y = 0;
		while (x < arr1.length && y < arr2.length)
		{
			if (arr1[x] < arr2[y])
			{
				System.out.print(arr1[x] + " ");
				x++;
			}
			else
			{
				System.out.print(arr2[y] + " ");
				y++;
			}
		}
		while (x < arr1.length)
		{
			System.out.print(arr1[x] + " ");
			x++;
		}
		while (y < arr2.length)
		{
			System.out.print(arr2[y] + " ");
			y++;
		}
	}
}'); ?>
</pre>
</details>
<!-- HALAMISH 9 END -->
<!-- HALAMISH 10 START -->
<h3>חלמיש 10</h3>
<div>
בהתאמת מחרוזות מחפשים מופע של מחרוזת אחת (התבנית) בתוך השנייה (הטקסט).<br>
לעיתים מחפשים התאמה לא מושלמת, שיש בה מספר סתירות - מקומות בהן התבנית שונה מהטקסט.<br>
לדוגמה: אם התבנית היא abac והטקסט הוא aabccc הרי במקום הראשון קיימת התאמה עם שתי סתירות (התו השני שונה a בטקסט ו- b בתבנית והתו השלישי שונה b בטקסט, a בתבנית).<br>
לעומת זאת במקום השני יש התאמה עם סתירה אחת (התו השלישי שונה - c בטקסט ו- a בתבנית). זוהי גם ההתאמה הטובה ביותר - יש בה מספר מינימאלי של סתירות.<br>
כתוב מתודה match המקבלת שתי מחרוזות - תבנית וטקסט ומחשבת את ההתאמה הטובה ביותר, המתודה תחזיר את מספר הסתירות בהתאמה זו.
</div>
<details>
<summary>הצג פתרון</summary>
<pre>
<?php showCode('public static int match(String pattern, String text)
{
	int bestConflictCount = text.length();
	for (int i = 0;i < text.length() - pattern.length();i++)
	{
		int countConflicts = 0;
		for (int j = 0;j < pattern.length();j++)
		{
			if (text.charAt(i + j) != pattern.charAt(j))
				countConflicts++;
		}
		if (countConflicts < bestConflictCount)
			bestConflictCount = countConflicts;
	}
	
	return bestConflictCount;
}'); ?>
</pre>
</details>
<!-- HALAMISH 10 END -->
<!-- HALAMISH 11 START -->
<h3>חלמיש 11</h3>
<div>
נתונה המתודה:<br>
<pre>
<?php showCode('public static void strange(int[] numbers)
{
	int temp;
	for (int i = 0;i < numbers.length - 1;i++)
	{
		for (int j = numbers.length - 1;j > i;j--)
		{
			if (numbers[j - 1] > numbers[j])
			{
				temp = numbers[j - 1];
				numbers[j - 1] = numbers[j];
				numbers[j] = temp;
			}
		}
	}
}'); ?>
</pre>
איך יראה המערך numbers הבא לאחר הרצת המתודה ()strange עליו?<br>
<pre>numbers = {0, 3, 4, 9, 8, 6, 5, 7, 2, 1}</pre>
</div>
<details>
<summary>הצג פתרון</summary>
<div>
<pre>
0 1 2 3 4 5 6 7 8 9 
</pre>
</div>
</details>
<!-- HALAMISH 11 END -->
<!-- HALAMISH 12 START -->
<h3>חלמיש 12</h3>
<div>
סדרת פיבונאצ'י היא סדרה בה האיברים הראשון והשני הם 1, ומהאיבר השלישי והלאה כל איבר שווה לסכום שני האיברים שלפניו.<br>
כתוב מתודה המקבלת מספר טבעי n (גדול או שווה 1, הנח שהוא תקין) ומחזירה את האיבר ה-n בסדרת פיבונאצ'י.
</div>
<details>
<summary>הצג פתרון</summary>
<div>
<pre>
<?php showCode('public static int getValueAtIndex(int n)
{
	if (n < 3)
		return 1;
	
	int[] p = new int[n];
	p[0] = 1;
	p[1] = 1;
	for (int i = 2;i < n;i++)
		p[i] = p[i - 1] + p[i - 2];
	
	return p[n - 1];
}'); ?>
</pre>
</div>
</details>
<!-- HALAMISH 12 END -->
<!-- HALAMISH 13 START -->
<h3>חלמיש 13</h3>
<div>
כתוב מתודה המקבלת מערך כפרמטר ומחזירה את הערך הקטן ביותר במערך.
</div>
<details>
<summary>הצג פתרון</summary>
<div>
<pre>
<?php showCode('public static int findMinimum(int[] arr)
{
	int min = arr[0];
	for (int i = 1;i < arr.length;i++)
		if (arr[i] < min)
			min = arr[i];
	
	return min;
}'); ?>
</pre>
</div>
</details>
<!-- HALAMISH 13 END -->
<!-- HALAMISH 14 START -->
<h3>חלמיש 14</h3>
<div>
כתוב מתודה המקבלת 2 מספרים שלמים a,b.<br>
(b ספרה אחת בלבד).<br>
המתודה מדפיסה את כל המספרים בין 0 ל- a שמקיימים את אחד התנאים הבאים:<br>
* המספר מכיל את b כאחד מספרותיו.<br>
* המספר מתחלק ב- b.
</div>
<details>
<summary>הצג פתרון</summary>
<div>
<pre>
<?php showCode('public static void printNumbers(int a, int b)
{
	for (int i = 0;i < a;i++)
	{
		if (i % b == 0)
			System.out.println(i);
		else
		{
			int copy = i;
			boolean flag = false;
			while (copy != 0 && !flag)
			{
				int remainder = copy % 10;
				if (remainder == b)
				{
					System.out.println(i);
					flag = true;
				}
				
				copy /= 10;
			}
		}
	}
}'); ?>
</pre>
</div>
</details>
<!-- HALAMISH 14 END -->
<!-- HALAMISH 15 START -->
<h3>חלמיש 15</h3>
<div>
נתון הקטע קוד הבא:<br>
<pre>
<?php showCode('public static void main(String[] args)
{
	int a = 3;
	int b = 7;
	int x;
	if (a++ != 0 || b -- != 0)
		x = 1;
	else
		x = 0;
	int y = (b--) * x;
	
	System.out.printf("%d %d %d %d", a, b, x, y);
}'); ?>
</pre>
רשום מהו הפלט של קטע קוד זה.
</div>
<details>
<summary>הצג פתרון</summary>
<div>
<pre>4 6 1 7</pre>
</div>
</details>
<!-- HALAMISH 15 END -->
<!-- HALAMISH 16 START -->
<h3>חלמיש 16</h3>
<div>
נתון הקטע קוד הבא:<br>
<pre>
<?php showCode('public class Halamish16
{
	static int c = 0;
	
	public static void main(String[] args)
	{
		int a = 3;
		for (int i = 1;i < a;i += 2)
			func(a * 5);
	}
	
	public static void func(int x)
	{
		c++;
		
		for (int i = 1;i < x;i *= 2)
			System.out.printf("%d %d", i, c);
	}
}'); ?>
</pre>
רשום מהו הפלט של קטע קוד זה.
</div>
<details>
<summary>הצג פתרון</summary>
<div>
<pre>1 12 14 18 1</pre>
</div>
</details>
<!-- HALAMISH 16 END -->
<!-- HALAMISH 17 START -->
<h3>חלמיש 17</h3>
<div>
כתוב מתודה המחשבת עצרת של מספר טבעי חיובי (הנח שהוא תקין) המתודה מקבלת כפרמטר את n ומחזירה n!
</div>
<details>
<summary>הצג פתרון</summary>
<div>
<pre>
<?php showCode('public static int getAzeret(int n)
{
	int azeret = 1;
	for (int i = 2;i <= n;i++)
		azeret *= i;
	
	return azeret;
}'); ?>
</pre>
</div>
</details>
<!-- HALAMISH 17 END -->
<!-- HALAMISH 18 START -->
<h3>חלמיש 18</h3>
<div>
כתוב מתודה המקבלת מספר טבעי חיובי h ומדפיסה משולש שווה שוקיים בגובה המשתנה, לדוגמה עבור h = 4 יודפס:<br>
<pre>
&nbsp;&nbsp;&nbsp;*
&nbsp;&nbsp;***
&nbsp;*****
*******
</pre>
</div>
<details>
<summary>הצג פתרון</summary>
<div>
<pre>
<?php showCode('public static void printTriangle(int h)
{
	for (int i = 1;i <= h;i++)
	{
		int spaces = h - i;
		
		for (int j = 0;j < spaces;j++)
			System.out.print(" ");
		for (int j = 0;j < i * 2 - 1;j++)
			System.out.print("*");
		System.out.println();
	}
}'); ?>
</pre>
</div>
</details>
<!-- HALAMISH 18 END -->
<!-- FOLLOW 1 START -->
<h3>מעקב 1</h3>
<div>נתון הקוד הבא:</div>
<pre>
<?php showCode('public static void main(String[] args)
{
	int number = 10;
	int d = 0;
	int sum = 0;
	while (number > 0)
	{
		number -= d;
		sum += number;
		d++;
		
		System.out.print(number + " ");
	}
	System.out.println();
	System.out.println("Sum is: " + sum);
	while (d >= 0)
	{
		d--;
		sum--;
	}
	System.out.println("Sum is: " + sum);
}'); ?>
</pre>
<div>העזרו בטבלת מעקב וכתבו מה תדפיס התכנית.</div>
<details>
<summary>הצג טבלת מעקב</summary>
<a class="imageModal" href="/images/java/1.jpg" title="לחץ להגדלה" data-width="4128" data-height="2322"><img src="/images/java/1.jpg" title="לחץ להגדלה" alt="לחץ להגדלה"></a>
</details>
<details>
<summary>הצג פתרון</summary>
<div>
<span>
10 9 7 4 0<br>
Sum is: 30<br>
Sum is: 24
</span>
</div>
</details>
<!-- FOLLOW 1 END -->
<!-- FOLLOW 2 START -->
<h3>מעקב 2</h3>
<div>נתון הקוד הבא:</div>
<pre>
<?php showCode('public static int what(int a, int b)
{
	int something = 0;
	while (a-- > 0)
		something++;
	while (b > 0)
	{
		b--;
		something--;
	}
	
	return something;
}'); ?>
</pre>
<div>
העזרו בטבלת מעקב וכתבו מה תחזיר הקריאה למתודה:
</div>
<pre>what(4, 2)</pre>
<pre>what(2, 4)</pre>
<div>
מה מטרת המתודה?
</div>
<details>
<summary>הצג טבלת מעקב</summary>
<a class="imageModal" href="/images/java/2.jpg" title="לחץ להגדלה" data-width="4128" data-height="2322"><img src="/images/java/2.jpg" title="לחץ להגדלה" alt="לחץ להגדלה"></a>
</details>
<details>
<summary>הצג פתרון</summary>
<div>
בקריאה הראשונה יחזור 2.<br>
בקריאה השנייה יחזור 2-.<br>
מטרת המתודה לעשות a - b.
</div>
</details>
<!-- FOLLOW 2 END -->
<!-- FOLLOW 3 START -->
<h3>מעקב 3</h3>
<div>נתון הקוד הבא:</div>
<pre>
<?php showCode('public static void main(String[] args)
{
	int x, y, z;
	for (x = 0; x < 3; x+=1)
	{
		switch (x)
		{
			case 1:
				System.out.print("One ");
			case 0:
				System.out.print("Zero ");
			case 2:
				System.out.print("Two ");
		}
		System.out.println();
		
		y = x;
		z = (y % 2) == 0 ? y++ : ++y;
		System.out.println("y= " + y + " z= " + z);
	}
}'); ?>
</pre>
<div>
העזרו בטבלת מעקב וכתבו מה יהיה פלט התכנית?
</div>
<details>
<summary>הצג טבלת מעקב</summary>
<a class="imageModal" href="/images/java/3.jpg" title="לחץ להגדלה" data-width="4128" data-height="2322"><img src="/images/java/3.jpg" title="לחץ להגדלה" alt="לחץ להגדלה"></a>
</details>
<details>
<summary>הצג פתרון</summary>
<div>
<span>
Zero Two<br>
y= 1 z= 0<br>
One Zero Two<br>
y= 2 z= 2<br>
Two<br>
y= 3 z= 2
</span>
</div>
</details>
<!-- FOLLOW 3 END -->
<!-- FOLLOW 4 START -->
<h3>מעקב 4</h3>
<div>נתון הקוד הבא:</div>
<pre>
<?php showCode('public class Maakav4
{
	static int k = 34;
	
	public static void main(String[] args)
	{
		int i = 33;
		int j = 42;
		i = func(i, j);
		System.out.println(i + " " + j + " " + k);
	}
	
	public static int func(int i, int j)
	{
		k = 4;
		k = i / k;
		j = i * k;
		i = k;
		
		return j;
	}
}'); ?>
</pre>
<div>
העזרו בטבלת מעקב וכתבו מה יהיה פלט התכנית?
</div>
<details>
<summary>הצג טבלת מעקב</summary>
<a class="imageModal" href="/images/java/4.jpg" title="לחץ להגדלה" data-width="4128" data-height="2322"><img src="/images/java/4.jpg" title="לחץ להגדלה" alt="לחץ להגדלה"></a>
</details>
<details>
<summary>הצג פתרון</summary>
<div>
<span>
264 42 8
</span>
</div>
</details>
<!-- FOLLOW 4 END -->
<!-- FOLLOW 5 START -->
<h3>מעקב 5</h3>
<div>נתון הקוד הבא:</div>
<pre>
<?php showCode('public class Maakav5
{
	static int i;
	
	public static void main(String[] args)
	{
		int j;
		char[] str = "Software Systems".toCharArray();
		
		foo(str);
		j = goo(i, str);
		
		String s = new String(str);
		System.out.println(s + " " + i + " " + j);
	}
	
	public static void foo(char[] str)
	{
		int length = str.length;
		boolean found = false;
		for (int j = 0;!found && j < length;j++)
		{
			if (str[j] == \' \')
			{
				found = true;
				i = j;
			}
		}
		
		str[i] = \'_\';
	}
	
	public static int goo(int i, char[] str)
	{
		int j = 1;
		while (j < str.length)
		{
			str[j - 1] = str[j];
			j++;
		}
		i = j;
		
		return i;
	}
}'); ?>
</pre>
<div>
העזרו בטבלת מעקב וכתבו מה יהיה פלט התכנית?
</div>
<details>
<summary>הצג טבלת מעקב</summary>
<a class="imageModal" href="/images/java/5.jpg" title="לחץ להגדלה" data-width="4128" data-height="2322"><img src="/images/java/5.jpg" title="לחץ להגדלה" alt="לחץ להגדלה"></a>
</details>
<details>
<summary>הצג פתרון</summary>
<div>
<span>
oftware_Systemss 8 16
</span>
</div>
</details>
<!-- FOLLOW 5 END -->
<!-- FOLLOW 6 START -->
<h3>מעקב 6</h3>
<div>נתון הקוד הבא:</div>
<pre>
<?php showCode('public static void main(String[] args)
{
	int a = 2;
	int b = 8;
	boolean ans = false;
	if (a == 1)
		ans = b == 1;
	else
		for (int n = 1;n <= b;n = n * a)
			if (n == b)
				ans = true;
	
	System.out.println(ans);
}'); ?>
</pre>
<div>
כתבו מה יהיה פלט התכנית?<br>
במידה ונחליף בין a ו-b, מה יהיה פלט התכנית החדש?<br>
מהי מטרת התכנית?
</div>
<details>
<summary>הצג טבלת מעקב</summary>
<a class="imageModal" href="/images/java/6.jpg" title="לחץ להגדלה" data-width="4128" data-height="2322"><img src="/images/java/6.jpg" title="לחץ להגדלה" alt="לחץ להגדלה"></a>
</details>
<details>
<summary>הצג פתרון</summary>
<div>
הפלט הראשון יהיה true<br>
הפלט השני יהיה false<br>
התכנית בודקת האם ניתן לייצג את b כ-a בחזקת מספר מסויים.
</div>
</details>
<!-- FOLLOW 6 END -->
<!-- FOLLOW 7 START -->
<h3>מעקב 7</h3>
<div>נתון הקוד הבא:</div>
<pre>
<?php showCode('public static void fun(int num1, int num2)
{
	boolean flag = true;
	int min = num1 <= num2 ? num1 : num2;
	for (int i = min;i >= 1 && flag;i--)
	{
		if (num1 % i == 0 && num2 % i == 0)
		{
			System.out.printf("i = %d", i);
			flag = false;
		}
	}
}'); ?>
</pre>
<div>
רשמו מה יהיה הפלט של המתודה בקריאה:<br>
<pre>fun(81, 54)</pre>
רשמו מהי משימת המתודה?
</div>
<details>
<summary>הצג טבלת מעקב</summary>
<table>
<tr><th>num1</th><th>num2</th><th>min</th></tr>
<tr><td>81</td><td>54</td><td>54</td></tr>
</table>
<br>
<table>
<tr><th>flag</th><th>i</th><th>i >= 1 &amp;&amp; flag</th><th>num1 % i == 0 &amp;&amp; num2 % i == 0</th></tr>
<tr><td>true</td><td>54</td><td>true</td><td>false</td></tr>
<tr><td>true</td><td>53</td><td>true</td><td>false</td></tr>
<tr><td>...</td><td>...</td><td>...</td><td>...</td></tr>
<tr><td>true</td><td>27</td><td>true</td><td>true (syso here)</td></tr>
<tr><td>false</td><td>26</td><td>false</td><td>-</td></tr>
</table>
</details>
<details>
<summary>הצג פתרון</summary>
<div>
הפלט יהיה i = 27.<br>
המתודה מדפיסה את המספר הגדול ביותר שמחלק גם את num1 וגם את num2 ללא שארית.
</div>
</details>
<!-- FOLLOW 7 END -->
<!-- ERRORS 1 START -->
<h3>שגיאות 1</h3>
<div>תלמיד התבקש לכתוב תכנית שתחשב ממוצע עבור 10 ציוניו של המשתמש ותדפיס אותו למסך, להלן התכנית:</div>
<pre>
<?php showCode('public static void main(String[] args)
{
	Scanner sc = new Scanner(System.in);
	int grade, sum;
	int average;
	System.out.print("Please enter 10 grades: ");
	for (i = 0; i <= 10; ++i)
	{
		grade = sc.nextInt();
		sum *= grade;
	}
	average = sum / 10;
	System.out.println("The average grade is: " + average);
}'); ?>
</pre>
<div>
בתכנית זו ישנם מספר שגיאות תחביריות ולוגיות, מצאו את כל השגיאות בקוד וסווגו אותם לשגיאות לוגיות או תחביריות.<br>
הסבירו במשפט עבור כל שגיאה שמצאתם מדוע היא אכן שגיאה.<br>
תזכורת:<br>
שגיאה תחבירית הינה שגיאה בתחביר השפה ,לדוגמא בסוף פקודה לא שמים ; שגיאה כזו תגרום לכישלון בתהליך הקומפילציה.<br>
שגיאה לוגית הינה שגיאה אשר מבחינה תחבירית תעבור את הקומפיילר אך היא שגיאה רעיונית ,לדוגמא :רוצים לחשב היקף מעגל אך רושמים נוסחה של שטח מעגל.<br>
לבסוף רשמו את התכנית בצורה מתוקנת.
</div>
<details>
<summary>הצג פתרון</summary>
<div>
שגיאות תחביריות:<br>
- לא הגדיר את המשתנה i בשום מקום - בשפת java חובה להגדיר סוג לכל משתנה.<br>
- לא אתחל את sum לפני שבצע עליו פעולות - בשפת java אי אפשר לעשות פעולות על משתנה (כמו כפל לדוגמה) לפני התחלתו בערך כלשהו.<br>
שגיאות לוגיות:<br>
- הלולאה רצה מ-0 עד 10 (כולל) ולכן תרוץ סה"כ 11 פעמים במקום 10.<br>
- בחישוב של הסכום הוא עושה כפל במקום חיבור.<br>
הקוד המתוקן:<br>
</div>
<pre>
<?php showCode('public static void main(String[] args)
{
	Scanner sc = new Scanner(System.in);
	int grade, sum = 0;
	int average;
	System.out.print("Please enter 10 grades: ");
	for (int i = 0; i < 10; ++i)
	{
		grade = sc.nextInt();
		sum += grade;
	}
	average = sum / 10;
	System.out.println("The average grade is: " + average);
}'); ?>
</pre>
</details>
<!-- ERRORS 1 END -->
<!-- ERRORS 2 START -->
<h3>שגיאות 2</h3>
<div>
תלמיד התבקש לכתוב תכנית אשר תחשב את היקפו ושטחו של מעגל עבור קלט של רדיוס.<br>
על התכנית לבצע את החישוב 5 פעמים עבור 5 קלטים מהמשתמש ולהדפיס למסך את תוצאת ההיקף והשטח המקסימלים שהתקבלו מבין 5 הרדיוסים.<br>
להלן קוד התלמיד:
</div>
<pre>
<?php showCode('import java.util.Scanner;

public class Errors2
{
	public static void main(String[] args)
	{
		int area perimeter;
		int radius;
		System.out.println("please enter 5 radiuses:");
		for (int i = 1; i < 5; i--)
		{
			radius = sc.nextDouble()
			perimeter = 2 * Math.PI * radius;
			area = Math.PI * radius * radius;
		}
		System.out.println("area: " area);
		System.out.println("perimeter: + perimeter");
		sc.close();
	}
}'); ?>
</pre>
<div>
בתכנית זו ישנם מספר שגיאות תחביריות ולוגיות, מצאו את כל השגיאות בקוד וסווגו אותם לשגיאות לוגיות או תחביריות.<br>
הסבירו במשפט עבור כל שגיאה שמצאתם מדוע היא אכן שגיאה.<br>
לבסוף רשמו את התכנית בצורה מתוקנת.
</div>
<details>
<summary>הצג פתרון</summary>
<div>
שגיאות תחביריות:<br>
- חסר פסיק בין המילים area ו- perimeter, חובה להפריד בין הגדרת משתנים בפסיקים.<br>
- חסר ; אחרי sc.nextDouble(), כל פקודה חייבת להסתיים ב;<br>
- המשתנה sc לא הוגדר כלל, חובה להגדיר משתנה לפני שמשתמשים בו.<br>
- לא ניתן לעשות nextDouble על משתנה radius כי הוא מסוג int הקטן יותר מ- double, לכן יש לשנות את סוגו ל-double.<br>
- המשתנים area ו- perimeter גם כן חייבים להיות double, כיוון שהמשתנה PI הוא double ולא ניתן להמיר מ-double ל- int.<br>
- חסר + בהדפסה של השטח ע"מ לשרשר בין המחרוזת למשתנה.<br>
- חייב לתת ערך התחלתי כלשהו למשתנים area ו- perimeter לפני השימוש בהם, במקרה הזה בהדפסות.<br>
שגיאות לוגיות:<br>
- לולאה אין סופית כיוון שכתוב i-- במקום i++.<br>
- לאחר השינוי ל- i++ הלולאה תרוץ רק 4 פעמים במקום 5 פעמים כמו שהתבקש.<br>
- המשתנה perimeter בהדפסה האחרונה יודפס כמילה perimeter ולא כערך המשתנה, יש להורד בסוף ההדפסה את הגרש ולהוסיפו לפני התו +.<br>
- התכנית לא מחשבת את מה שהתבקש, היא תדפיס את השטח וההיקף האחרונים שחושבו ולא את המקסימלים.<br>
הקוד המתוקן:<br>
</div>
<pre>
<?php showCode('import java.util.Scanner;

public class Errors2
{
	public static void main(String[] args)
	{
		double maxArea = 0, maxPerimeter = 0, radius;
		Scanner sc = new Scanner(System.in);
		System.out.println("Please enter 5 radiuses:");
		for (int i = 0; i < 5; i++)
		{
			radius = sc.nextDouble();
			double tempPerimeter = 2 * Math.PI * radius;
			if (tempPerimeter > maxPerimeter)
				maxPerimeter = tempPerimeter;
			double tempArea = Math.PI * radius * radius;
			if (tempArea > maxArea)
				maxArea = tempArea;
		}
		System.out.println("max area: " + maxArea);
		System.out.println("max perimeter: " + maxPerimeter);
		sc.close();
	}
}'); ?>
</pre>
</details>
<!-- ERRORS 2 END -->
<!-- EXAM 1 START -->
<h3>מבחן 1</h3>
<div>
<u>סעיף א</u><br>
נתון מערך:
<pre>arr = {4, 6, 2, 0, 5, 1}</pre>
כתבו מה יהיה הפלט של התכנית הבאה:
<pre>
<?php showCode('int cell = 3;
while (cell >= 0 && cell <= 5)
{
	System.out.println(cell);
	cell = arr[cell];
}'); ?>
</pre>
מה יקרה אם משנים את cell ל- 2?
</div>
<details>
<summary>הצג פתרון</summary>
<div>
<pre>
3
0
4
5
1
</pre>
אם משנים את cell ל- 2 תתקבל לולאה אינסופית.
</div>
</details>
<div>
<u>סעיף ב</u><br>
מה יהיה הפלט של הקטע קוד הבא?
<pre>
<?php showCode('int sum = 0;
for (int i = 3;i <= 8;i++)
	if (i % 2 == 1)
		sum = sum + i * 2;
System.out.println(sum);'); ?>
</pre>
</div>
<details>
<summary>הצג פתרון</summary>
<div>
<pre>
30
</pre>
</div>
</details>
<!-- EXAM 1 END -->
<!-- EXAM 2 START -->
<h3>מבחן 2</h3>
<div>
כתבו מתודה:
<pre>
public static boolean isEqualSum(int[] pos, int[] values)
</pre>
הבודקת האם סכום המספרים ממערך values בכל מקום שבו במערך pos הערך הוא 1 שווה לסכום המספרים במערך values שבו בכל מקום במערך pos הערך הוא 0.
</div>
<details>
<summary>הצג פתרון</summary>
<div>
<pre>
<?php showCode('public static boolean isEqualSum(int[] pos, int[] values)
{
	int sumOnes = 0;
	int sumZeros = 0;
	for (int i = 0;i < pos.length;i++)
	{
		if (pos[i] == 1)
			sumOnes += values[i];
		else
			sumZeros += values[i];
	}
	
	return sumOnes == sumZeros;
}'); ?>
</pre>
</div>
</details>
<!-- EXAM 2 END -->
<!-- EXAM 3 START -->
<h3>מבחן 3</h3>
<div>
כתבו מתודה:
<pre>
public static int evenOdd(int[] array, int[] arrEven, int[] arrOdd)
</pre>
המקבלת מערך array עם מספרים שונים מ-0 ושני מערכים נוספים שכל הערכים בהם הם 0.<br>
3 המערכים שווים בדוגלם.<br>
המתודה צריכה להכניס את כל האיברים הזוגיים ממערך array למערך arrEven ואת כל האי-זוגיים למערך arrOdd.<br>
אם הוכנסו יותר מספרים אי-זוגיים מזוגיים, המתודה תחזיר 2.<br>
אם הוכנסו יותר מספרים זוגיים מאי-זוגיים, המתודה תחזיר 1.<br>
אחרת, המתודה תחזיר 0 אם הם שווים.
</div>
<details>
<summary>הצג פתרון</summary>
<div>
<pre>
<?php showCode('public static int evenOdd(int[] array, int[] arrEven, int[] arrOdd)
{
	int iEven = 0;
	int iOdd = 0;
	for (int i = 0;i < array.length;i++)
	{
		if (array[i] % 2 == 0)
		{
			arrEven[iEven] = array[i];
			iEven++;
		}
		else
		{
			arrOdd[iOdd] = array[i];
			iOdd++;
		}
	}
	if (iOdd > iEven)
		return 2;
	if (iEven > iOdd)
		return 1;
	
	return 0;
}'); ?>
</pre>
</div>
</details>
<!-- EXAM 3 END -->
<!-- EXAM 4 START -->
<h3>מבחן 4</h3>
<div>
כתבו מתודה:
<pre>
public static void update_arr(int[] arr, int i, int x)
</pre>
המקבלת arr מערך ממויין.<br>
המתודה צריכה להוסיף מספר x כלשהו לערך הקיים במקום ה- i במערך.<br>
לאחר הכנסת הערך על המערך להשאר ממויין.<br>
כתבו את המתודה שמוסיפה את הערך במקום המבוקש וממיינת את המערך.
</div>
<details>
<summary>הצג פתרון</summary>
<div>
<pre>
<?php showCode('public static void update_arr(int[] arr, int i, int x)
{
	arr[i] += x;
	while (i < arr.length - 1)
	{
		if (arr[i] > arr[i + 1])
		{
			int temp = arr[i + 1];
			arr[i + 1] = arr[i];
			arr[i] = temp;
		}
		i++;
	}
}'); ?>
</pre>
</div>
</details>
<!-- EXAM 4 END -->
<!-- EXAM 5 START -->
<h3>מבחן 5</h3>
<div>
נתון הקטע קוד הבא:
<pre>
<?php showCode('Scanner sc = new Scanner(System.in);
String str = sc.nextLine();
String str1 = str.substring(0, str.length() / 2);
String str2 = str.substring((str.length() + 1) / 2, str.length());
if (str1.equals(str2))
	System.out.println("Yes");
else
	System.out.println("No");'); ?>
</pre>
<u>סעיף א</u><br>
מה יודפס עבור המחרוזות הבאים?<br>
test string<br>
abcabc<br>
teststest<br>
<u>סעיף ב</u><br>
מה עושה התכנית?
</div>
<details>
<summary>הצג פתרון</summary>
<div>
עבור test string תדפיס No<br>
עבור abcabc תדפיס Yes<br>
עבור teststest תדפיס Yes<br>
<br>
התכנית בודקת האם החצי הראשון של המחרוזת שווה לחצי השני שלה.
</div>
</details>
<!-- EXAM 5 END -->
<!-- CHALLANGE 1 START -->
<h3>אתגר 1</h3>
<ol>
<li>צור enum בשם MatrixType עם הערכים הבאים: ZERO,I,OTHER.</li>
<li>צור מחלקה בשם SquareMatrix המייצגת מטריצות ריבועיות המכילה את המשתנה הבא: private int[][] matrix</li>
<li>צור getter / setter עבור המשתנה הנ"ל, שימו לב כי ב-setter יש לוודא שהמטריצה שהתקבלה אכן ריבועית, אחרת יש לזרוק שגיאת IllegalArgumentException.</li>
<li>כתוב בנאי המקבל מטריצה אשר קורא למתודת ה- setter שיצרתם עם המטריצה שהתקבלה.</li>
<li>כתוב בנאי המקבל מערך ובודק האם המערך יכול לייצג מטריצה ריבועית (מערך יכול לייצג מטריצה ריבועית אם ניתן להוציא שורש לאורך המערך בלי שארית), במידה ולא ניתן יש לזרוק IllegalArgumentException, אחרת יש להפוך את המערך למטריצה בהתאם.</li>
<li>כתוב בנאי שלא מקבל פרמטרים, הבנאי ייצור מטריצה בגודל אקראי (בין 2 ל-4) עם ערכים אקראיים (בין 20- ל- 20).</li>
<li>כתוב בנאי המקבל פרמטר מסוג MatrixType, הבנאי ייצור מטריצה כך שאם ייתקבל ZERO כפרמטר תווצר מטריצת אפסים, אם ייתקבל I תווצר מטריצת היחידה, אחרת תווצר מטריצה עם ערכים אקראיים (כמו בסעיף 6, גודל המטריצה אקראי בכל 3 המקרים).</li>
<li>דרוס את מתודת equals הבודקת האם 2 אובייקטים מסוג SquareMatrix שווים, הם שווים רק כאשר המטריצות שהם מכילים שווים בגודלן ובערכיהן.</li>
<li>דרוס את מתודת hashCode המחזירה את גודל המטריצה + סכום איברייה, לדוגמה עבור מטריצה בגודל 2x2 עם סכום איברים 17, המתודה תחזיר 21.</li>
<li>דרוס את מתודת toString המחזירה מחרוזת המייצגת את המטריצה בצורה הבאה:<br>
לדוגמה עבור המטריצה:<br>
1&nbsp;&nbsp;2&nbsp;&nbsp;3<br>
A= 6&nbsp;&nbsp;5&nbsp;&nbsp;4<br>
7&nbsp;&nbsp;8&nbsp;&nbsp;9<br>
תחזור המחרוזת:<br>
[&nbsp;&nbsp;1&nbsp;&nbsp;2&nbsp;&nbsp;3&nbsp;&nbsp;]<br>
[&nbsp;&nbsp;4&nbsp;&nbsp;5&nbsp;&nbsp;6&nbsp;&nbsp;]<br>
[&nbsp;&nbsp;7&nbsp;&nbsp;8&nbsp;&nbsp;9&nbsp;&nbsp;]
</li>
<li>יישם את מתודת clone ממחלקת Cloneable המעתיקה את האובייקט הנוכחי.</li>
<li>יישם את מתודת compareTo ממחלקת Comparable הבודקת האם אובייקט מסוג SquareMatrix שהתקבל כפרמטר קטן/שווה/גדול מהאובייקט הנוכחי.<br>
אם המטריצה של האובייקט הנוכחי קטנה מהמטריצה שהתקבלה כפרמטר המתודה תחזיר 1-, אחרת אם היא גדולה תחזיר 1, אחרת 0.<br>
ההשוואה תעשה קודם על גודלי המטריצות, אם הגדלים שווים, תעשה השוואה נוספת על סכום איברי המטריצות.<br>
לדוגמה מטריצה עם גודל 3x3 גדולה ממטריצה עם גודל 2x2, אבל אם הגדלים שווים אז מטריצה עם סכום איברים 17 תהיה גדולה ממטריצה עם סכום איברים 12.
</li>
<li>כתוב מתודה הבודקת האם המטריצה הנוכחית היא מטריצה היחידה או מטריצת האפס ומחזירה I או ZERO בהתאמה, אחרת תחזיר OTHER.</li>
<li>כתוב מתודה המשחלפת את המטריצה הנוכחית ומחזירה את המטריצה המשוחלפת באובייקט חדש מסוג SquareMatrix. (אין לעשות שינויים למטריצה הקיימת)</li>
<li>כתוב מתודה הבודקת האם SquareMatrix שהתקבלה כפרמטר מחזיקה במטריצה המשוחלפת של המטריצה באובייקט הנוכחי, ומחזירה אמת או שקר בהתאמה.</li>
<li>כתוב מתודה המחברת בין 2 מטריצות ומחזירה את התוצאה באובייקט חדש מסוג SquareMatrix (אין לשנות את המטריצות הנתונות), במידה ולא ניתן לחבר בין 2 המטריצות יש לזרוק שגאית ArithmeticException.</li>
<li>כמו סעיף קודם, רק הכפלת מטריצות.</li>
<li>כמו סעיף קודם, רק כפל בסקלר. (שימו לב כאן אין צורך לזרוק שגיאה כלשהי).</li>
<li>כתוב מתודה הממיינת את המטריצה של האובייקט הנוכחי כך שכל המספרים השליליים יעברו להתחלת המטריצה וכל המספרים החיוביים יעברו לסוף המטריצה.</li>
<li>כתוב מתודה הבודקת האם מטריצה היא אלכסונית ומחזירה אמת/שקר בהתאם.</li>
<li>כתוב מתודה המקבלת מספר שורה/עמודת התחלה start ומספר שורה/עמודת סיום end ומחזירה תת מטריצה של המטריצה הנוכחית בטווח בין start ל- end כולל.<br>
אם ה- start או ה- end לא חוקיים (קטנים מ-0 או גדולים מגודל המטריצה או ש-start גדול מ-end) יש לזרוק שגיאת ArrayIndexOutOfBoundsException.<br>
לדוגמה עבור המטריצה הבאה עם start=1 ו- end=2:<br>
1&nbsp;&nbsp;2&nbsp;&nbsp;3<br>
A= 6&nbsp;&nbsp;5&nbsp;&nbsp;4<br>
7&nbsp;&nbsp;8&nbsp;&nbsp;9<br>
תחזור התת מטריצה:<br>
B= 5&nbsp;&nbsp;4<br>
7&nbsp;&nbsp;8<br>
</li>
</ol>
<div>
<details>
<summary>הצג MatrixType</summary>
<pre>
<?php showCode('public enum MatrixType
{
	ZERO,
	I,
	OTHER
}'); ?>
</pre>
</details>
<details>
<summary>הצג SquareMatrix</summary>
<pre>
<?php showCode('import java.util.Random;

public class SquareMatrix implements Cloneable, Comparable<SquareMatrix>
{
	private int[][] matrix;

	public SquareMatrix(int[][] matrix)
	{
		setMatrix(matrix);
	}

	public SquareMatrix(int[] vector)
	{
		int vectorSize = vector.length;
		double squaredSize = Math.sqrt(vectorSize);
		double remainder = squaredSize - (int) squaredSize;
		if (remainder != 0)
			throw new IllegalArgumentException("The given vector doesnt result in a perfect square!");

		int matrixSize = (int) squaredSize;
		matrix = new int[matrixSize][matrixSize];

		int outerIndex = 0;
		int innerIndex = 0;
		for (int i = 0;i < vectorSize;i++)
		{
			matrix[outerIndex][innerIndex] = vector[i];

			innerIndex++;
			if (innerIndex == matrixSize)
			{
				innerIndex = 0;
				outerIndex++;
			}
		}
	}

	public SquareMatrix()
	{
		matrix = generateRandomMatrix();
	}

	public SquareMatrix(MatrixType type)
	{
		if (type == MatrixType.OTHER)
			matrix = generateRandomMatrix();
		else
		{
			Random random = new Random();
			int matrixSize = random.nextInt(3) + 2;

			matrix = new int[matrixSize][matrixSize];
			if (type == MatrixType.I)
				for (int i = 0;i < matrixSize;i++)
					matrix[i][i] = 1;
		}
	}

	public void setMatrix(int[][] matrix)
	{
		for (int[] row : matrix)
			if (matrix.length != row.length)
				throw new IllegalArgumentException("The given matrix isnt square!");

		this.matrix = matrix;
	}

	public int[][] getMatrix()
	{
		return matrix;
	}

	public MatrixType getMatrixType()
	{
		boolean isZero = true;
		boolean isOne = true;
		for (int i = 0;i < matrix.length && (isZero || isOne);i++)
		{
			for (int j = 0;j < matrix[i].length && (isZero || isOne);j++)
			{
				if (matrix[i][j] != 0)
				{
					if (i != j)
						isOne = false;

					isZero = false;
				}
				if (i == j && matrix[i][j] != 1)
					isOne = false;
			}
		}
		if (isZero)
			return MatrixType.ZERO;
		if (isOne)
			return MatrixType.I;

		return MatrixType.OTHER;
	}

	public SquareMatrix transposeMatrix()
	{
		int[][] tempMatrix = new int[matrix.length][matrix.length];
		for (int i = 0;i < matrix.length;i++)
			for (int j = 0;j < matrix[i].length;j++)
				tempMatrix[j][i] = matrix[i][j];

		return new SquareMatrix(tempMatrix);
	}

	public boolean isTranspose(SquareMatrix other)
	{
		int[][] otherMatrix = other.matrix;
		if (otherMatrix.length != matrix.length)
			return false;

		for (int i = 0;i < matrix.length;i++)
			for (int j = 0;j < matrix[i].length;j++)
				if (otherMatrix[i][j] != matrix[j][i])
					return false;

		return true;
	}

	public SquareMatrix addMatrix(SquareMatrix other)
	{
		int[][] otherMatrix = other.matrix;
		if (otherMatrix.length != matrix.length)
			throw new ArithmeticException("Given matrixes sizes are different and therefore they cannot be added.");

		int[][] addedMatrix = new int[matrix.length][matrix.length];
		for (int i = 0;i < matrix.length;i++)
			for (int j = 0;j < matrix[i].length;j++)
				addedMatrix[i][j] = matrix[i][j] + otherMatrix[i][j];

		return new SquareMatrix(addedMatrix);
	}

	public SquareMatrix mulMatrix(SquareMatrix other)
	{
		int[][] otherMatrix = other.matrix;
		if (otherMatrix.length != matrix.length)
			throw new ArithmeticException("Given matrixes sizes are different and therefore they cannot be muled.");

		int[][] muledMatrix = new int[matrix.length][matrix.length];
		for (int i = 0;i < matrix.length;i++) // Rows from matrix 1.
			for (int j = 0;j < otherMatrix[i].length;j++) // Columns from matrix 2.
				for (int k = 0;k < matrix[i].length;k++) // Columns from matrix 1.
					muledMatrix[i][j] += matrix[i][k] * otherMatrix[k][j];

		return new SquareMatrix(muledMatrix);
	}

	public SquareMatrix mulByScalar(int scalar)
	{
		int[][] tempMatrix = new int[matrix.length][matrix.length];
		for (int i = 0;i < matrix.length;i++)
			for (int j = 0;j < matrix[i].length;j++)
				tempMatrix[i][j] = scalar * matrix[i][j];

		return new SquareMatrix(tempMatrix);
	}

	public void sort()
	{
		for (int i = 0;i < matrix.length;i++)
		{
			for (int j = 0;j < matrix[i].length;j++)
			{
				// Positive, need to move to end.
				if (matrix[i][j] >= 0)
				{
					boolean replaced = false;
					for (int x = matrix.length - 1;x >= 0 && !replaced;x--)
					{
						for (int y = matrix[x].length - 1;y >= 0 && !replaced;y--)
						{
							if (x == i && y == j)
								return; // If we got to the same indexes from start and end, that means no more numbers to sort, exit.

							// Negative, need to move to start.
							if (matrix[x][y] < 0)
							{
								int temp = matrix[x][y];
								matrix[x][y] = matrix[i][j];
								matrix[i][j] = temp;

								replaced = true;
							}
						}
					}
				}
			}
		}
	}

	public boolean isDiagonal()
	{
		for (int i = 0;i < matrix.length;i++)
			for (int j = 0;j < matrix[i].length;j++)
				if (i != j && matrix[i][j] != 0)
					return false;

		return true;
	}

	public SquareMatrix subMatrix(int start, int end)
	{
		if (start < 0 || end < 0 || start >= matrix.length || end >= matrix.length || start > end)
			throw new ArrayIndexOutOfBoundsException("Indexes cannot be smaller than 0 or bigger than matrix length, also start cannot be bigger than end.");

		int newSize = end - start + 1;
		int[][] newMatrix = new int[newSize][newSize];
		for (int x = 0;x < newSize;x++)
			for (int y = 0;y < newSize;y++)
				newMatrix[x][y] = matrix[x + start][y + start];

		return new SquareMatrix(newMatrix);
	}

	@Override
	public boolean equals(Object other)
	{
		if (!(other instanceof SquareMatrix))
			return false;

		SquareMatrix otherMatrixObject = (SquareMatrix) other;
		int[][] otherMatrix = otherMatrixObject.matrix;
		if (matrix.length != otherMatrix.length)
			return false;

		for (int i = 0;i < matrix.length;i++)
			for (int j = 0;j < matrix[i].length;j++)
				if (matrix[i][j] != otherMatrix[i][j])
					return false;

		return true;
	}

	@Override
	public int hashCode()
	{
		return sumElements() + matrix.length * 2;
	}

	@Override
	public String toString()
	{
		String matrixString = "";
		for (int i = 0;i < matrix.length;i++)
		{
			matrixString += "[\t";
			for (int j = 0;j < matrix[i].length;j++)
				matrixString += matrix[i][j] + "\t";
			matrixString += "]\n";
		}

		return matrixString;
	}

	@Override
	public SquareMatrix clone()
	{
		return new SquareMatrix(matrix.clone());
	}

	@Override
	public int compareTo(SquareMatrix other)
	{
		int[][] otherMatrix = other.matrix;
		if (otherMatrix.length < matrix.length)
			return 1;
		if (otherMatrix.length > matrix.length)
			return -1;

		int otherSum = other.sumElements();
		int mySum = sumElements();
		if (otherSum < mySum)
			return 1;
		if (otherSum > mySum)
			return -1;

		return 0;
	}

	private int[][] generateRandomMatrix()
	{
		Random random = new Random();
		int matrixSize = random.nextInt(3) + 2;
		int[][] matrix = new int[matrixSize][matrixSize];
		for (int i = 0;i < matrixSize;i++)
			for (int j = 0;j < matrixSize;j++)
				matrix[i][j] = random.nextInt(41) - 20;

		return matrix;
	}

	private int sumElements()
	{
		int sum = 0;
		for (int i = 0;i < matrix.length;i++)
			for (int j = 0;j < matrix[i].length;j++)
				sum += matrix[i][j];

		return sum;
	}
}'); ?>
</pre>
</details>
<details>
<summary>הצג Main</summary>
<pre>
<?php showCode('public class Main
{
	public static void main(String[] args)
	{
		int[][] matrix =
		{
			{-1, 2, -3},
			{4, -5, 6},
			{7, -8, -9}
		};
		int[] vector = {2, 5, 3, 4};
		int[] vector2 = {9, 8, 7, 6, 5, 4, 3, 2, 1};
		
		SquareMatrix one = new SquareMatrix(matrix);
		SquareMatrix two = new SquareMatrix(vector);
		SquareMatrix three = new SquareMatrix();
		SquareMatrix four = new SquareMatrix(MatrixType.I);
		SquareMatrix five = new SquareMatrix(vector2);
		
		System.out.println("Matrix 1:");
		System.out.println(one);
		System.out.println("Matrix 2:");
		System.out.println(two);
		System.out.println("Matrix 3:");
		System.out.println(three);
		System.out.println("Matrix 4:");
		System.out.println(four);
		System.out.println("Matrix 5:");
		System.out.println(five);
		System.out.println("Matrix 4 type:");
		System.out.println(four.getMatrixType());
		System.out.println("Matrix 1 transpose:");
		System.out.println(one.transposeMatrix());
		System.out.println("Matrix 1 transpose to matrix 3?");
		System.out.println(one.isTranspose(three));
		System.out.println("Add of matrix 1 and 5:");
		System.out.println(one.addMatrix(five));
		System.out.println("Mul of matrix 1 and 5:");
		System.out.println(one.mulMatrix(five));
		System.out.println("Mul of matrix 1 by scalar 3:");
		System.out.println(one.mulByScalar(3));
		System.out.println("Sort of matrix 1:");
		one.sort();
		System.out.println(one);
		System.out.println("Is matrix 3 diagonal?");
		System.out.println(three.isDiagonal());
		System.out.println("Sub matrix of matrix 5 with i=1 and j=2 is:");
		System.out.println(five.subMatrix(1, 2));
		System.out.println("Is matrix 4 equals to its transpose?");
		System.out.println(four.equals(four.transposeMatrix()));
		System.out.println("Matrix 2 hashCode is:");
		System.out.println(two.hashCode());
		System.out.println("Matrix 2 clone is:");
		System.out.println(two.clone());
		switch (two.compareTo(four))
		{
			case 1:
				System.out.println("Matrix 2 is bigger than matrix 4.");
				break;
			case -1:
				System.out.println("Matrix 2 is smaller than matrix 4.");
				break;
			default:
				System.out.println("Matrix 2 is equal to matrix 4.");
				break;
		}
	}
}'); ?>
</pre>
</details>
</div>
<!-- CHALLANGE 1 END -->
</div>
</div>
</div>
</main>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</div>
</body>
</html>