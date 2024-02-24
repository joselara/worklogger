export function titleCase(input: string): string {
    return input
        .replace(/_/g, " ")
        .toLowerCase()
        .split(" ")
        .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
        .join(" ");
}

export function truncate(
    input: string,
    maxLength: number = 50,
    endWithWord: boolean = true
): string {
    if (input.length <= maxLength) {
        return input;
    }

    if (endWithWord) {
        const lastSpace = input.lastIndexOf(" ", maxLength);

        if (lastSpace !== -1) {
            return input.substring(0, lastSpace) + "...";
        }
    }

    return input.substring(0, maxLength) + "...";
}
